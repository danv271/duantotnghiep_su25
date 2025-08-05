<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voucher;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Support\Facades\Log;

class VoucherController extends Controller
{
    public function applyVoucher(Request $request): JsonResponse
    {
        $request->validate([
            'voucher_codes' => 'required|array',
            'voucher_codes.*' => 'string',
            'order_amount' => 'required|numeric|min:0',
            'shipping_cost' => 'required|numeric|min:0'
        ]);

        $voucherCodes = $request->input('voucher_codes');
        $orderAmount = $request->input('order_amount');
        $shippingCost = $request->input('shipping_cost');

        $appliedVouchers = [];
        $productDiscount = 0;
        $shippingDiscount = 0;
        $finalShippingCost = $shippingCost;
        $hasShippingVoucher = false;
        $hasProductVoucher = false;

        // Lấy giá sản phẩm gốc từ cart (không bao gồm phí ship)
        $userId = Auth::check() ? Auth::id() : null;
        $productAmount = 0;
        
        if ($userId) {
            $cart = Cart::where('user_id', $userId)
                ->with('cartItem.variant.product')
                ->first();
            
            if ($cart && $cart->cartItem) {
                foreach ($cart->cartItem as $item) {
                    $productAmount += $item->variant->price * $item->quantity;
                }
            }
        } else {
            $cartItems = session('cart', []);
            foreach ($cartItems as $item) {
                $productAmount += $item['price'] * $item['quantity'];
            }
        }

        // Debug: Kiểm tra giá trị productAmount
        Log::info('Debug productAmount calculation:', [
            'userId' => $userId,
            'productAmount' => $productAmount,
            'orderAmount' => $orderAmount,
            'shippingCost' => $shippingCost
        ]);

        // Bắt đầu transaction để đảm bảo atomicity
        DB::beginTransaction();
        
        try {
            foreach ($voucherCodes as $voucherCode) {
                // Sử dụng lockForUpdate để tránh race condition
                $voucher = Voucher::lockForUpdate()->where('code', $voucherCode)->first();

                if (!$voucher) {
                    DB::rollBack();
                    return response()->json([
                        'success' => false,
                        'message' => "Mã voucher {$voucherCode} không tồn tại!"
                    ]);
                }

                // Kiểm tra lại validity với lock
                if (!$voucher->isValid($productAmount)) {
                    $message = "Voucher {$voucherCode} không hợp lệ!";
                    
                    if (!$voucher->is_active) {
                        $message = " Voucher {$voucherCode} đã bị vô hiệu hóa!";
                    } elseif (now() < $voucher->start_date || now() > $voucher->end_date) {
                        $message = " Voucher {$voucherCode} chưa có hiệu lực hoặc đã hết hạn!";
                    } elseif ($voucher->used_count >= $voucher->max_usage) {
                        $message = " Voucher {$voucherCode} đã hết lượt sử dụng! (Đã dùng: {$voucher->used_count}/{$voucher->max_usage})";
                    } elseif ($productAmount < $voucher->min_order_amount) {
                        $message = " Đơn hàng chưa đạt giá trị tối thiểu để sử dụng voucher {$voucherCode}! (Cần: " . number_format($voucher->min_order_amount) . " VNĐ)";
                    }

                    DB::rollBack();
                    return response()->json([
                        'success' => false,
                        'message' => $message
                    ]);
                }

            // Kiểm tra xem đã có voucher shipping chưa
            if ($voucher->isShippingVoucher()) {
                if ($hasShippingVoucher) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Chỉ có thể áp dụng một voucher miễn phí vận chuyển!'
                    ]);
                }
                $hasShippingVoucher = true;
                $shippingDiscount = $shippingCost; // Trừ toàn bộ phí ship
                $finalShippingCost = 0;
            } else {
                // Kiểm tra xem đã có voucher product chưa
                if ($hasProductVoucher) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Chỉ có thể áp dụng một voucher giảm giá sản phẩm!'
                    ]);
                }
                $hasProductVoucher = true;
                // Tính giảm giá dựa trên giá sản phẩm gốc từ cart
                $productDiscount = $voucher->calculateDiscount($productAmount, 0);
            }

            $appliedVouchers[] = [
                'code' => $voucher->code,
                'name' => $voucher->name,
                'type' => $voucher->type,
                'discount_value' => $voucher->discount_value,
                'description' => $voucher->description,
                'type_label' => $voucher->getTypeLabel()
            ];
        }

        $finalTotal = $productAmount - $productDiscount + $finalShippingCost;

        // Debug: Kiểm tra giá trị
        Log::info('Debug VoucherController calculation:', [
            'productAmount' => $productAmount,
            'productDiscount' => $productDiscount,
            'shippingDiscount' => $shippingDiscount,
            'finalShippingCost' => $finalShippingCost,
            'finalTotal' => $finalTotal
        ]);

        // Commit transaction nếu tất cả voucher đều hợp lệ
        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'Áp dụng voucher thành công!',
            'data' => [
                'vouchers' => $appliedVouchers,
                'product_discount' => $productDiscount,
                'shipping_discount' => $shippingDiscount,
                'new_shipping_cost' => $finalShippingCost,
                'final_total' => $finalTotal,
                'original_total' => $orderAmount
            ]
        ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Voucher application error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi áp dụng voucher: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Xóa voucher đã áp dụng
     */
    public function removeVoucher(Request $request): JsonResponse
    {
        $request->validate([
            'order_amount' => 'required|numeric|min:0',
            'shipping_cost' => 'required|numeric|min:0'
        ]);

        // Lấy giá sản phẩm gốc từ cart (không bao gồm phí ship)
        $userId = Auth::check() ? Auth::id() : null;
        $productAmount = 0;
        
        if ($userId) {
            $cart = Cart::where('user_id', $userId)
                ->with('cartItem.variant.product')
                ->first();
            
            if ($cart && $cart->cartItem) {
                foreach ($cart->cartItem as $item) {
                    $productAmount += $item->variant->price * $item->quantity;
                }
            }
        } else {
            $cartItems = session('cart', []);
            foreach ($cartItems as $item) {
                $productAmount += $item['price'] * $item['quantity'];
            }
        }

        // Luôn sử dụng giá trị gốc cho shipping cost (30000)
        $originalShippingCost = 30000;
        $finalTotal = $productAmount + $originalShippingCost;

        return response()->json([
            'success' => true,
            'message' => 'Đã xóa voucher!',
            'data' => [
                'product_discount' => 0,
                'shipping_discount' => 0,
                'new_shipping_cost' => $originalShippingCost,
                'final_total' => $finalTotal,
                'original_total' => $finalTotal,
                'product_amount' => $productAmount
            ]
        ]);
    }

    /**
     * Lấy danh sách voucher có sẵn
     */
    public function getVouchers(Request $request): JsonResponse
    {
        $orderAmount = $request->input('order_amount', 0);
        $shippingCost = $request->input('shipping_cost', 30000);

        // Lấy giá sản phẩm gốc từ cart (không bao gồm phí ship)
        $userId = Auth::check() ? Auth::id() : null;
        $productAmount = 0;
        
        if ($userId) {
            $cart = Cart::where('user_id', $userId)
                ->with('cartItem.variant.product')
                ->first();
            
            if ($cart && $cart->cartItem) {
                foreach ($cart->cartItem as $item) {
                    $productAmount += $item->variant->price * $item->quantity;
                }
            }
        } else {
            $cartItems = session('cart', []);
            foreach ($cartItems as $item) {
                $productAmount += $item['price'] * $item['quantity'];
            }
        }

        $vouchers = Voucher::where('is_active', true)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->where('used_count', '<', DB::raw('max_usage'))
            ->get();

        $availableVouchers = [];
        foreach ($vouchers as $voucher) {
            $isValid = $voucher->isValid($productAmount);
            $productDiscount = 0;
            $shippingDiscount = 0;
            $newShippingCost = $shippingCost;
            
            if ($voucher->isShippingVoucher()) {
                $shippingDiscount = $shippingCost;
                $newShippingCost = 0;
            } else {
                $productDiscount = $voucher->calculateDiscount($productAmount, 0);
            }
            
            $finalTotal = $productAmount - $productDiscount + $newShippingCost;

            $availableVouchers[] = [
                'id' => $voucher->id,
                'code' => $voucher->code,
                'name' => $voucher->name,
                'description' => $voucher->description,
                'type' => $voucher->type,
                'discount_value' => $voucher->discount_value,
                'min_order_amount' => $voucher->min_order_amount,
                'is_valid' => $isValid,
                'product_discount' => $productDiscount,
                'shipping_discount' => $shippingDiscount,
                'new_shipping_cost' => $newShippingCost,
                'final_total' => $finalTotal,
                'type_label' => $voucher->getTypeLabel()
            ];
        }

        return response()->json([
            'success' => true,
            'data' => $availableVouchers
        ]);
    }
}
