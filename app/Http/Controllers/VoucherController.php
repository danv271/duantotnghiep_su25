<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class VoucherController extends Controller
{
    /**
     * Lấy danh sách voucher khả dụng cho checkout
     */
    public function getVouchers(Request $request)
    {
        $orderAmount = $request->get('order_amount', 0);
        $shippingCost = $request->get('shipping_cost', 30000);
        
        $now = Carbon::now();
        
        $vouchers = Voucher::where('is_active', true)
            ->where('start_date', '<=', $now)
            ->where('end_date', '>=', $now)
            ->whereColumn('used_count', '<', 'max_usage')
            ->where('min_order_amount', '<=', $orderAmount)
            ->get()
            ->map(function ($voucher) use ($orderAmount, $shippingCost) {
                $isValid = $voucher->isValid($orderAmount);
                $savings = $isValid ? $voucher->calculateDiscount($orderAmount, $shippingCost) : 0;
                $finalTotal = $orderAmount + $shippingCost - $savings;
                
                return [
                    'id' => $voucher->id,
                    'code' => $voucher->code,
                    'name' => $voucher->name,
                    'description' => $voucher->description,
                    'type' => $voucher->type,
                    'type_label' => $voucher->getTypeLabel(),
                    'discount_value' => $voucher->discount_value,
                    'min_order_amount' => $voucher->min_order_amount,
                    'is_valid' => $isValid,
                    'savings' => $savings,
                    'final_total' => $finalTotal,
                ];
            });
        
        return response()->json([
            'success' => true,
            'data' => $vouchers
        ]);
    }

    /**
     * Áp dụng voucher cho đơn hàng
     */
    public function applyVoucher(Request $request)
    {
        $request->validate([
            'voucher_codes' => 'required|array',
            'voucher_codes.*' => 'string',
            'order_amount' => 'required|numeric|min:0',
            'shipping_cost' => 'required|numeric|min:0',
        ]);

        $voucherCodes = $request->voucher_codes;
        $orderAmount = $request->order_amount;
        $shippingCost = $request->shipping_cost;
        
        $appliedVouchers = [];
        $productDiscount = 0;
        $shippingDiscount = 0;
        $hasShippingVoucher = false;
        $hasProductVoucher = false;
        
        foreach ($voucherCodes as $code) {
            $voucher = Voucher::where('code', $code)->first();
            
            if (!$voucher) {
                return response()->json([
                    'success' => false,
                    'message' => "Voucher {$code} không tồn tại!"
                ]);
            }
            
            if (!$voucher->isValid($orderAmount)) {
                return response()->json([
                    'success' => false,
                    'message' => "Voucher {$code} không hợp lệ hoặc đã hết hạn!"
                ]);
            }
            
            if ($voucher->isShippingVoucher() && !$hasShippingVoucher) {
                $hasShippingVoucher = true;
                $shippingDiscount = $shippingCost;
                $appliedVouchers[] = [
                    'id' => $voucher->id,
                    'code' => $voucher->code,
                    'name' => $voucher->name,
                    'type' => $voucher->type,
                    'type_label' => $voucher->getTypeLabel(),
                ];
            } elseif ($voucher->isProductVoucher() && !$hasProductVoucher) {
                $hasProductVoucher = true;
                $productDiscount = $voucher->calculateDiscount($orderAmount, 0);
                $appliedVouchers[] = [
                    'id' => $voucher->id,
                    'code' => $voucher->code,
                    'name' => $voucher->name,
                    'type' => $voucher->type,
                    'type_label' => $voucher->getTypeLabel(),
                ];
            } else {
                return response()->json([
                    'success' => false,
                    'message' => "Chỉ có thể áp dụng 1 voucher ship và 1 voucher sản phẩm!"
                ]);
            }
        }
        
        $newShippingCost = $shippingCost - $shippingDiscount;
        $finalTotal = $orderAmount - $productDiscount + $newShippingCost;
        
        return response()->json([
            'success' => true,
            'message' => 'Áp dụng voucher thành công!',
            'data' => [
                'vouchers' => $appliedVouchers,
                'product_discount' => $productDiscount,
                'shipping_discount' => $shippingDiscount,
                'new_shipping_cost' => $newShippingCost,
                'final_total' => $finalTotal,
                'product_amount' => $orderAmount,
            ]
        ]);
    }
    
    /**
     * Xóa tất cả voucher đã áp dụng
     */
    public function removeVoucher(Request $request)
    {
        $request->validate([
            'order_amount' => 'required|numeric|min:0',
            'shipping_cost' => 'required|numeric|min:0',
        ]);
        
        $orderAmount = $request->order_amount;
        $shippingCost = $request->shipping_cost;
        
        return response()->json([
            'success' => true,
            'message' => 'Đã xóa tất cả voucher!',
            'data' => [
                'vouchers' => [],
                'product_discount' => 0,
                'shipping_discount' => 0,
                'new_shipping_cost' => $shippingCost,
                'final_total' => $orderAmount + $shippingCost,
                'product_amount' => $orderAmount,
            ]
        ]);
    }
} 