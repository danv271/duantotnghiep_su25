<?php

namespace App\Http\Controllers;

use App\Jobs\SendPaymentReminderEmail;
use App\Mail\OrderSuccessMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\PaymentTransaction;
use App\Models\PendingTransaction;
use App\Models\User;
use App\Models\Variant;
use App\Models\Voucher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

use Carbon\Carbon;


class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $cartItems = [];
        $subtotal = 0;
        $shipping = 30000; // phí vận chuyển cố định
        $total = 0;
        $itemCount = 0;
        $discount = 0;
        $appliedVoucher = null;

        $userId = null;

        // Xử lý selected_items từ cart form
        $selectedItems = $request->input('selected_items');
        $selectedItemIds = [];
        
        if ($selectedItems) {
            $selectedItemIds = explode(',', $selectedItems);
        }

        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::where('id',$userId)->first();
            $cart = Cart::where('user_id', $userId)
            ->with(['cartItem.variant.product.images' => function ($query) {
                $query->orderBy('id', 'asc')->take(1); // Lấy 1 hình ảnh đầu tiên cho mỗi product
            }])
            ->first();

            if ($cart && $cart->cartItem) {
                // Lọc theo selected_items nếu có
                $filteredCartItems = $cart->cartItem;
                if (!empty($selectedItemIds)) {
                    $filteredCartItems = $cart->cartItem->filter(function ($item) use ($selectedItemIds) {
                        return in_array($item->id, $selectedItemIds);
                    });
                }
                
                $cartItems = $filteredCartItems->map(function ($cartItem) {
                    return (object)[
                        'cart_item_id' => $cartItem->id,
                        'quantity' => $cartItem->quantity,
                        'product_name' => $cartItem->variant->product->name,
                        'variant_price' => $cartItem->variant->price,
                        'max_quantity' => $cartItem->variant->stock_quantity,
                        'image_path' => $cartItem->variant->product->images->first()
                            ? $cartItem->variant->product->images->first()->path
                            : null,
                        'variant_id' => $cartItem->variant->id,
                    ];
                });
            }

            foreach ($cartItems as $item) {
                $subtotal += $item->variant_price * $item->quantity;
                $itemCount += $item->quantity;
            }
            $total = $subtotal + $shipping;

            $now = Carbon::now();
            $shippingVouchers = \App\Models\Voucher::where('is_active', true)
                ->where('type', 'shipping')
                ->where('start_date', '<=', $now)
                ->where('end_date', '>=', $now)
                ->whereColumn('used_count', '<', 'max_usage')
                ->get();
            $productVouchers = \App\Models\Voucher::where('is_active', true)
                ->where('type', 'product')
                ->where('start_date', '<=', $now)
                ->where('end_date', '>=', $now)
                ->whereColumn('used_count', '<', 'max_usage')
                ->get();

        return view('checkout', compact('cartItems', 'subtotal', 'shipping', 'total', 'itemCount', 'userId', 'cart','user', 'discount', 'appliedVoucher', 'shippingVouchers', 'productVouchers'));

        } else {
            $cartItems = session('cart', []);
            
            // Lọc theo selected_items nếu có
            if (!empty($selectedItemIds)) {
                $filteredCartItems = [];
                foreach ($cartItems as $variantId => $item) {
                    if (in_array($variantId, $selectedItemIds)) {
                        $filteredCartItems[$variantId] = $item;
                    }
                }
                $cartItems = $filteredCartItems;
            }

            foreach ($cartItems as $variantId => $item) {
                $subtotal += $item['price'] * $item['quantity'];
                $itemCount += $item['quantity'];
            }
            $total = $subtotal + $shipping;
            return view('checkout', compact('cartItems', 'subtotal', 'shipping', 'total', 'itemCount', 'userId', 'discount', 'appliedVoucher'));

        }

        // $total = $subtotal + $shipping;

        // return view('checkout', compact('cartItems', 'subtotal', 'shipping', 'total', 'itemCount', 'userId', 'cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'note' => 'nullable|string|max:255',
            'payment_method' => 'required|in:cash,transfer',

            'voucher_codes' => 'nullable|array',
            'voucher_codes.*' => 'string',
        ]);

        // Xử lý voucher nếu có
        $appliedVouchers = [];
        $productDiscount = 0;
        $shippingDiscount = 0;
        $finalShipping = 30000;
        $hasShippingVoucher = false;
        $hasProductVoucher = false;
        
        // Lấy giỏ hàng để tính giá gốc sản phẩm
        $userId = Auth::check() ? Auth::id() : null;
        $cartItems = [];
        
        // Xử lý selected_items từ checkout form
        $selectedItems = $request->input('selected_items');
        $selectedItemIds = [];
        
        if ($selectedItems) {
            $selectedItemIds = explode(',', $selectedItems);
        }

        if (Auth::check()) {
            $cart = Cart::where('user_id', $userId)
                ->with('cartItem.variant.product')
                ->first();

            if ($cart && $cart->cartItem) {
                // Lọc theo selected_items nếu có
                $filteredCartItems = $cart->cartItem;
                if (!empty($selectedItemIds)) {
                    $filteredCartItems = $cart->cartItem->filter(function ($item) use ($selectedItemIds) {
                        return in_array($item->id, $selectedItemIds);
                    });
                }
                $cartItems = $filteredCartItems;
            }
        } else {
            $cartItems = session('cart', []);
            
            // Lọc theo selected_items nếu có
            if (!empty($selectedItemIds)) {
                $filteredCartItems = [];
                foreach ($cartItems as $variantId => $item) {
                    if (in_array($variantId, $selectedItemIds)) {
                        $filteredCartItems[$variantId] = $item;
                    }
                }
                $cartItems = $filteredCartItems;
            }
        }

        if (empty($cartItems)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống!');
        }

        // Tính giá sản phẩm gốc từ cart items
        $originalSubtotal = 0;
        if (Auth::check()) {
            foreach ($cartItems as $item) {
                $originalSubtotal += $item->variant->price * $item->quantity;
            }
        } else {
            foreach ($cartItems as $variantId => $item) {
                $originalSubtotal += $item['price'] * $item['quantity'];
            }
        }
        
        if ($request->filled('voucher_codes')) {
            // Phân loại voucher
            foreach ($request->voucher_codes as $code) {
                $voucher = Voucher::where('code', $code)->first();
                if ($voucher) {
                    if ($voucher->isShippingVoucher() && !$hasShippingVoucher) {
                        // Voucher vận chuyển: trừ toàn bộ phí ship
                        $hasShippingVoucher = true;
                        $shippingDiscount = 30000;
                        $finalShipping = 0;
                        $appliedVouchers[] = $voucher;
                    } elseif ($voucher->isProductVoucher() && !$hasProductVoucher) {
                        // Voucher sản phẩm: áp dụng vào giá gốc sản phẩm
                        $hasProductVoucher = true;
                        $productDiscount = $voucher->calculateDiscount($originalSubtotal, 0);
                        $appliedVouchers[] = $voucher;
                    }
                }
            }
        }

        // Lưu dữ liệu đơn hàng tạm vào session (hoặc cache)
        session([
            'checkout_data' => $request->all(),
            'applied_vouchers' => collect($appliedVouchers)->pluck('id')->toArray(),
            'product_discount' => $productDiscount,
            'shipping_discount' => $shippingDiscount,
            'final_shipping' => $finalShipping
        ]);

        if ($request->payment_method === 'transfer') {
            return $this->redirectToVNPAY();
        }
        
        // Nếu chọn thanh toán tiền mặt (cash) → thực hiện lên đơn ngay
        // Sử dụng lại cartItems đã được lọc ở trên, không cần lấy lại
        $subtotal = 0;
        if (Auth::check()) {
            foreach ($cartItems as $item) {
                $subtotal += $item->variant->price * $item->quantity;
            }
        } else {
            foreach ($cartItems as $variantId => $item) {
                $subtotal += $item['price'] * $item['quantity'];
            }
        }

        $shipping = 30000;
        $total = $subtotal + $shipping;

        // Lưu dữ liệu đơn hàng tạm vào session, kèm theo tổng tiền
        $requestData = $request->all();
        $requestData['subtotal'] = $subtotal;
        $requestData['shipping'] = $shipping;
        $requestData['total'] = $total;

        session(['checkout_data' => $requestData]);

        // Gọi chuyển hướng sang VNPay nếu chọn thanh toán chuyển khoản
        if ($request->payment_method === 'transfer') {
            return $this->redirectToVNPAY();
        }

        if (empty($cartItems)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống!');
        }

        DB::beginTransaction();

        try {
            // Tính toán tổng tiền cuối cùng với voucher
            // $originalSubtotal đã được tính từ trước (giá sản phẩm gốc)
            $finalSubtotal = $originalSubtotal - $productDiscount; // Giá sản phẩm sau giảm giá
            $finalTotal = $finalSubtotal + $finalShipping; // Tổng cuối = Giá sản phẩm sau giảm + Phí ship cuối

            // Debug: Kiểm tra giá trị
            Log::info('Debug voucher calculation:', [
                'originalSubtotal' => $originalSubtotal,
                'productDiscount' => $productDiscount,
                'finalSubtotal' => $finalSubtotal,
                'finalShipping' => $finalShipping,
                'finalTotal' => $finalTotal
            ]);

            // Kiểm tra lại số lượng tồn kho trước khi tạo đơn hàng
            if (Auth::check()) {
                foreach ($cartItems as $item) {
                    $variant = Variant::find($item->variant_id);
                    if (!$variant) {
                        DB::rollBack();
                        return redirect()->route('cart.index')->with('error', "Sản phẩm không tồn tại!");
                    }
                    
                    if ($item->quantity > $variant->stock_quantity) {
                        DB::rollBack();
                        return redirect()->route('cart.index')->with('error', 
                            "Số lượng sản phẩm {$variant->product->name} vượt quá tồn kho! Tồn kho: {$variant->stock_quantity}, đã chọn: {$item->quantity}");
                    }
                }
            } else {
                foreach ($cartItems as $variantId => $item) {
                    $variant = Variant::find($variantId);
                    if (!$variant) {
                        DB::rollBack();
                        return redirect()->route('cart.index')->with('error', "Sản phẩm không tồn tại!");
                    }
                    
                    if ($item['quantity'] > $variant->stock_quantity) {
                        DB::rollBack();
                        return redirect()->route('cart.index')->with('error', 
                            "Số lượng sản phẩm {$variant->product->name} vượt quá tồn kho! Tồn kho: {$variant->stock_quantity}, đã chọn: {$item['quantity']}");
                    }
                }
            }

            // Tạo đơn hàng
            $order = Order::create([
                'user_id'  => $userId,
                'user_name' => $request->name,
                'user_email' => $request->email,
                'user_phone' => $request->phone,
                'user_address' => $request->address,
                'user_note' => $request->note,
                'type_payment' => $request->payment_method,
                'total_price' => $finalTotal,
                'shipping_cost' => $finalShipping,
                'product_discount' => $productDiscount,
                'shipping_discount' => $shippingDiscount,
                'applied_vouchers' => !empty($appliedVouchers) ? json_encode($appliedVouchers) : null,
            ]);

            if (Auth::check()) {
                // PHÂN BỔ GIẢM GIÁ SẢN PHẨM (KHÔNG PHÂN BỔ GIẢM GIÁ SHIP)
                foreach ($cartItems as $item) {
                    if ($item->quantity > $item->variant->stock_quantity) {
                        DB::rollBack();
                        return redirect()->route('cart.index')->with('error', "Số lượng sản phẩm {$item->variant->product->name} vượt quá tồn kho!");
                    }

                    $item_total = $item->variant->price * $item->quantity;
                    $item_discount = $originalSubtotal > 0 ? ($item_total / $originalSubtotal) * $productDiscount : 0;
                    $item_price_after_discount = $item_total - $item_discount;

                    OrderDetail::create([
                        'order_id' => $order->id,
                        'variant_id' => $item->variant_id,
                        'quantity' => $item->quantity,
                        'variant_price' => $item->variant->price,
                        'total_price' => $item_price_after_discount,
                        'discount' => $item_discount,
                        'price' => $item_total, // Giá gốc trước khi giảm
                    ]);
                }

                // Xóa giỏ hàng
                CartItem::where('cart_id', $cart->id)->delete();
            } else {
                // PHÂN BỔ GIẢM GIÁ SẢN PHẨM (KHÔNG PHÂN BỔ GIẢM GIÁ SHIP)
                foreach ($cartItems as $variantId => $item) {
                    $variant = Variant::findOrFail($variantId);
                    if ($item['quantity'] > $variant->stock_quantity) {
                        DB::rollBack();
                        return redirect()->route('cart.index')->with('error', "Số lượng sản phẩm {$item['product_name']} vượt quá tồn kho!");
                    }

                    $item_total = $item['price'] * $item['quantity'];
                    $item_discount = $originalSubtotal > 0 ? ($item_total / $originalSubtotal) * $productDiscount : 0;
                    $item_price_after_discount = $item_total - $item_discount;

                    OrderDetail::create([
                        'order_id' => $order->id,
                        'variant_id' => $variantId,
                        'quantity' => $item['quantity'],
                        'variant_price' => $item['price'],
                        'total_price' => $item_price_after_discount,
                        'discount' => $item_discount,
                        'price' => $item_total, // Giá gốc trước khi giảm
                    ]);
                }

                session()->push('order_code', $order->id);
                session()->forget('cart');
            }

            // Nếu bạn có bảng payments → thêm record vào đây
            Payment::create([
                'order_id' => $order->id,
                'payment_method' => 'cash',
                'amount' => $finalTotal,
                'payment_date' => now(),
            ]);

            // Tăng số lần sử dụng voucher nếu có
            foreach ($appliedVouchers as $voucher) {
                $voucher->incrementUsage();
            }


            DB::commit();
            // Gửi mail xác nhận
            Mail::to($order->user_email)->send(new OrderSuccessMail($order));
            return redirect()->route('checkout.success', $order->id)->with('success', 'Đặt hàng thành công!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('cart.index')->with('error', 'Có lỗi xảy ra: ' . $e->getMessage());
        }
        return redirect()->back()->with('error', 'Chỉ hỗ trợ thanh toán online hiện tại!');
    }

    private function redirectToVNPAY()
{
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    $vnp_TmnCode = env('VNPAY_TMN_CODE');
    $vnp_HashSecret = env('VNPAY_HASH_SECRET');
    $vnp_Url = env('VNPAY_URL', 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html');
    $vnp_ReturnUrl = env('VNPAY_RETURN_URL', 'https://demo.vistar.click/checkout/vnpay-return');


        // Lấy dữ liệu đơn hàng tạm từ session
        $checkoutData = session('checkout_data');
        $appliedVouchers = session('applied_vouchers', []);
        $productDiscount = session('product_discount', 0);
        $shippingDiscount = session('shipping_discount', 0);
        $finalShipping = session('final_shipping', 30000);

        if (!$checkoutData) {
            return redirect()->route('checkout.index')->with('error', 'Không tìm thấy dữ liệu đơn hàng.');
        }

        // Tính lại tổng tiền từ giỏ hàng
        if(Auth::check()){
            $userId = Auth::id();
            $cart = Cart::where('user_id', $userId)
                ->with(['cartItem.variant'])
                ->first();
            $subtotal = 0;

            if ($cart && $cart->cartItem) {
                foreach ($cart->cartItem as $item) {
                    $subtotal += $item->variant->price * $item->quantity;
                }
            }
        }else{
            $cart = session('cart', []);
            $subtotal = 0;

            if ($cart) {
                foreach ($cart as $item) {
                    $subtotal += $item['price']* $item['quantity'];
                }
            }
        }

        // Áp dụng voucher
        $shipping = $finalShipping;
        $total = $subtotal + $shipping - $productDiscount;
        if ($total < 0) $total = 0;

        // Debug: Kiểm tra giá trị redirectToVNPAY
        Log::info('Debug redirectToVNPAY calculation:', [
            'subtotal' => $subtotal,
            'productDiscount' => $productDiscount,
            'shippingDiscount' => $shippingDiscount,
            'finalShipping' => $finalShipping,
            'total' => $total
        ]);

    // Lấy thông tin từ session checkout_data
$sessionData = session('checkout_data');

if (!$sessionData) {
    return redirect()->route('checkout.index')->with('error', 'Không tìm thấy dữ liệu đơn hàng.');
}

$userId = Auth::check() ? Auth::id() : null;
$cartItems = [];

// Xử lý selected_items từ session
$selectedItems = $sessionData['selected_items'] ?? null;
$selectedItemIds = [];

if ($selectedItems) {
    $selectedItemIds = explode(',', $selectedItems);
}

if ($userId) {
    $cart = Cart::where('user_id', $userId)
        ->with(['cartItem.variant'])
        ->first();
    
    // Lọc theo selected_items nếu có
    $filteredCartItems = $cart?->cartItem ?? collect();
    if (!empty($selectedItemIds)) {
        $filteredCartItems = $cart->cartItem->filter(function ($item) use ($selectedItemIds) {
            return in_array($item->id, $selectedItemIds);
        });
    }
    $cartItems = $filteredCartItems;
} else {
    $cartItems = session('cart', []);
    
    // Lọc theo selected_items nếu có
    if (!empty($selectedItemIds)) {
        $filteredCartItems = [];
        foreach ($cartItems as $variantId => $item) {
            if (in_array($variantId, $selectedItemIds)) {
                $filteredCartItems[$variantId] = $item;
            }
        }
        $cartItems = $filteredCartItems;
    }
}


$totalAmount = $sessionData['total'] ?? 0;

$checkoutData = [
    'email' => $sessionData['email'],
    'name' => $sessionData['name'],
    'phone' => $sessionData['phone'],
    'address' => $sessionData['address'],
    'note' => $sessionData['note'] ?? '',
    'total' => $totalAmount,
    'items' => [],
];

if ($userId) {
    foreach ($cartItems as $item) {
        $checkoutData['items'][] = [
            'variant_id' => $item->variant_id,
            'price' => $item->variant->price,
            'quantity' => $item->quantity,
        ];
    }
} else {
    foreach ($cartItems as $variantId => $item) {
        $checkoutData['items'][] = [
            'variant_id' => $variantId,
            'price' => $item['price'],
            'quantity' => $item['quantity'],
        ];
    }
} 

    // Mã giao dịch
    $vnp_TxnRef = uniqid();
    $vnp_OrderInfo = 'Thanh toán đơn hàng ' . $vnp_TxnRef;
    $vnp_OrderType = 'billpayment';
    $vnp_Amount = $totalAmount * 100; // VNPAY yêu cầu nhân 100
    $vnp_Locale = 'vn';
    $vnp_IpAddr = request()->ip();
    $vnp_CreateDate = date('YmdHis');
    $vnp_ExpireDate = date('YmdHis', time() + 15 * 60);

    $inputData = [
        'vnp_Version' => '2.1.0',
        'vnp_TmnCode' => $vnp_TmnCode,
        'vnp_Amount' => $vnp_Amount,
        'vnp_Command' => 'pay',
        'vnp_CreateDate' => $vnp_CreateDate,
        'vnp_CurrCode' => 'VND',
        'vnp_IpAddr' => $vnp_IpAddr,
        'vnp_Locale' => $vnp_Locale,
        'vnp_OrderInfo' => $vnp_OrderInfo,
        'vnp_OrderType' => $vnp_OrderType,
        'vnp_ReturnUrl' => $vnp_ReturnUrl,
        'vnp_TxnRef' => $vnp_TxnRef,
        'vnp_ExpireDate' => $vnp_ExpireDate,
    ];

    // Tạo chuỗi hash và URL chuyển hướng
    ksort($inputData);
    $hashData = http_build_query($inputData, '', '&');
    $vnp_SecureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

    $query = http_build_query($inputData);
    $vnpayUrl = $vnp_Url . '?' . $query . '&vnp_SecureHash=' . $vnp_SecureHash;

    // Lưu thông tin giao dịch tạm
    session(['vnp_txn_ref' => $vnp_TxnRef]);

    $pending = PendingTransaction::create([
        'vnp_txn_ref' => $vnp_TxnRef,
        'user_id' => Auth::check() ? Auth::id() : null,
        'user_email' => $checkoutData['email'],
        'checkout_data' => json_encode($checkoutData),
        'amount' => $totalAmount,
        'expires_at' => now()->addMinutes(5),
    ]);

    SendPaymentReminderEmail::dispatch($pending)->delay(now()->addMinutes(1));

    return redirect($vnpayUrl);
}


    public function vnpayReturn(Request $request)
    {
        $vnp_HashSecret = env('VNPAY_HASH_SECRET');

        // Loại bỏ hash khỏi dữ liệu
        $inputData = $request->except(['vnp_SecureHash', 'vnp_SecureHashType']);
        ksort($inputData);

        // Tạo chuỗi hash theo chuẩn VNPay
        $hashData = http_build_query($inputData, '', '&');
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        if ($secureHash === $request->input('vnp_SecureHash') && $request->input('vnp_ResponseCode') == '00') {
            $userId = Auth::check() ? Auth::id() : null;

            $checkoutData = session('checkout_data');
            $appliedVouchers = session('applied_vouchers', []);
            $productDiscount = session('product_discount', 0);
            $shippingDiscount = session('shipping_discount', 0);
            $finalShipping = session('final_shipping', 30000);
            
            if (!$checkoutData) {
                return redirect()->route('cart.index')->with('error', 'Không tìm thấy dữ liệu đơn hàng.');
            }

            // Lấy giỏ hàng từ DB nếu đã đăng nhập, hoặc từ session nếu chưa
            $cartItems = null;
            
            // Xử lý selected_items từ session
            $selectedItems = $checkoutData['selected_items'] ?? null;
            $selectedItemIds = [];
            
            if ($selectedItems) {
                $selectedItemIds = explode(',', $selectedItems);
            }
            
            if ($userId) {
                $cart = Cart::where('user_id', $userId)->with('cartItem.variant.product')->first();
                if (!$cart || $cart->cartItem->isEmpty()) {
                    return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống!');
                }
                
                // Lọc theo selected_items nếu có
                $filteredCartItems = $cart->cartItem;
                if (!empty($selectedItemIds)) {
                    $filteredCartItems = $cart->cartItem->filter(function ($item) use ($selectedItemIds) {
                        return in_array($item->id, $selectedItemIds);
                    });
                }
                $cartItems = $filteredCartItems;
            } else {
                $cartItems = session('cart');
                if (!$cartItems || empty($cartItems)) {
                    return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống!');
                }
                
                // Lọc theo selected_items nếu có
                if (!empty($selectedItemIds)) {
                    $filteredCartItems = [];
                    foreach ($cartItems as $variantId => $item) {
                        if (in_array($variantId, $selectedItemIds)) {
                            $filteredCartItems[$variantId] = $item;
                        }
                    }
                    $cartItems = $filteredCartItems;
                }
            }

            if (empty($cartItems)) {
                return redirect()->route('cart.index')->with('error', 'Không có sản phẩm nào được chọn!');
            }

            DB::beginTransaction();

            try {
                // Tính toán tổng tiền cuối cùng với voucher
                // Tính giá sản phẩm gốc từ cart items
                $originalSubtotal = 0;
                if ($userId) {
                    foreach ($cartItems as $item) {
                        $originalSubtotal += $item->variant->price * $item->quantity;
                    }
                } else {
                    foreach ($cartItems as $variantId => $item) {
                        $originalSubtotal += $item['price'] * $item['quantity'];
                    }
                }
                
                $finalSubtotal = $originalSubtotal - $productDiscount; // Giá sản phẩm sau giảm giá
                $finalTotal = $finalSubtotal + $finalShipping; // Tổng cuối = Giá sản phẩm sau giảm + Phí ship cuối

                // Debug: Kiểm tra giá trị VNPAY return
                Log::info('Debug VNPAY return calculation:', [
                    'originalSubtotal' => $originalSubtotal,
                    'productDiscount' => $productDiscount,
                    'finalSubtotal' => $finalSubtotal,
                    'finalShipping' => $finalShipping,
                    'finalTotal' => $finalTotal,
                    'checkoutData_total' => $checkoutData['total'] ?? 'N/A'
                ]);
                // Kiểm tra lại số lượng tồn kho trước khi tạo đơn hàng
                if ($userId) {
                    foreach ($cartItems as $item) {
                        $variant = Variant::find($item->variant_id);
                        if (!$variant) {
                            DB::rollBack();
                            return redirect()->route('cart.index')->with('error', "Sản phẩm không tồn tại!");
                        }
                        
                        if ($item->quantity > $variant->stock_quantity) {
                            DB::rollBack();
                            return redirect()->route('cart.index')->with('error', 
                                "Số lượng sản phẩm {$variant->product->name} vượt quá tồn kho! Tồn kho: {$variant->stock_quantity}, đã chọn: {$item->quantity}");
                        }
                    }
                } else {
                    foreach ($cartItems as $variantId => $item) {
                        $variant = Variant::find($variantId);
                        if (!$variant) {
                            DB::rollBack();
                            return redirect()->route('cart.index')->with('error', "Sản phẩm không tồn tại!");
                        }
                        
                        if ($item['quantity'] > $variant->stock_quantity) {
                            DB::rollBack();
                            return redirect()->route('cart.index')->with('error', 
                                "Số lượng sản phẩm {$variant->product->name} vượt quá tồn kho! Tồn kho: {$variant->stock_quantity}, đã chọn: {$item['quantity']}");
                        }
                    }
                }

                $order = Order::create([
                    'user_id' => $userId,
                    'user_name' => $checkoutData['name'],
                    'user_email' => $checkoutData['email'],
                    'user_phone' => $checkoutData['phone'],
                    'user_address' => $checkoutData['address'],
                    'user_note' => $checkoutData['note'] ?? '',
                    'type_payment' => 'VNPAY',
                    'status_order' => 'đang xử lý',
                    'status_payment' => 'đã thanh toán',
                    'total_price' => $finalTotal,
                    'shipping_cost' => $finalShipping,
                    'product_discount' => $productDiscount,
                    'shipping_discount' => $shippingDiscount,
                    'applied_vouchers' => !empty($appliedVouchers) ? json_encode($appliedVouchers) : null,
                ]);

                // Lưu chi tiết đơn hàng
                if ($userId) {
                    foreach ($cartItems as $item) {
                        $item_total = $item->variant->price * $item->quantity;
                        $item_discount = $originalSubtotal > 0 ? ($item_total / $originalSubtotal) * $productDiscount : 0;
                        $item_price_after_discount = $item_total - $item_discount;
                        OrderDetail::create([
                            'order_id' => $order->id,
                            'variant_id' => $item->variant_id,
                            'quantity' => $item->quantity,
                            'variant_price' => $item->variant->price,
                            'total_price' => $item_price_after_discount,
                            'discount' => $item_discount,
                            'price' => $item_total, // Giá gốc trước khi giảm
                        ]);
                    }

                    // Xóa giỏ hàng DB
                    CartItem::where('cart_id', $cart->id)->delete();
                } else {
                    foreach ($cartItems as $variantId => $item) {
                        $item_total = $item['price'] * $item['quantity'];
                        $item_discount = $originalSubtotal > 0 ? ($item_total / $originalSubtotal) * $productDiscount : 0;
                        $item_price_after_discount = $item_total - $item_discount;
                        OrderDetail::create([
                            'order_id' => $order->id,
                            'variant_id' => $variantId,
                            'quantity' => $item['quantity'],
                            'variant_price' => $item['price'],
                            'total_price' => $item_price_after_discount,
                            'discount' => $item_discount,
                            'price' => $item_total, // Giá gốc trước khi giảm
                        ]);
                    }
                    session()->push('order_code', $order->id);
                    // Xóa giỏ hàng trong session
                    session()->forget('cart');
                }

                $payment = Payment::create([
                    'order_id' => $order->id,
                    'payment_method' => 'vnpay',
                    'amount' => $finalTotal,
                    'payment_date' => now(),
                ]);

                // Tăng số lần sử dụng voucher nếu có
                foreach ($appliedVouchers as $voucherId) {
                    $voucher = Voucher::find($voucherId);
                    if ($voucher) {
                        $voucher->incrementUsage();
                    }
                }

                PaymentTransaction::create([
                    'payment_id' => $payment->id,
                    'order_id' => $order->id,
                    'gateway' => 'vnpay',
                    'transaction_status' => 'success',
                    'amount' => $finalTotal,
                    'currency' => 'VND',
                    'transaction_date' => now(),
                    'response_transaction' => json_encode($request->all(), JSON_UNESCAPED_UNICODE),
                ]);

                DB::commit();

                session()->forget(['checkout_data', 'applied_vouchers', 'product_discount', 'shipping_discount', 'final_shipping']);
                // Gửi mail xác nhận
                Mail::to($order->user_email)->send(new OrderSuccessMail($order));
                return redirect()->route('checkout.success', $order->id)->with('success', 'Thanh toán thành công!');

            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('VNPAY Return Error: ' . $e->getMessage());
                return redirect()->route('cart.index')->with('error', 'Có lỗi xảy ra khi xử lý thanh toán: ' . $e->getMessage());
            }
        }

        return redirect()->route('checkout.index')->with('error', 'Thanh toán không thành công hoặc dữ liệu không hợp lệ.');
    }
//      public function vnpayReturn(Request $request)
// {
//     // để la
//     $vnp_HashSecret = env('VNPAY_HASH_SECRET');

//     $vnpData = $request->all();
//     $vnp_SecureHash = $vnpData['vnp_SecureHash'] ?? '';

//     unset($vnpData['vnp_SecureHash']);
//     unset($vnpData['vnp_SecureHashType']);

//     ksort($vnpData);
//     $hashData = http_build_query($vnpData, '', '&');
//     $secureHashCheck = hash_hmac('sha512', $hashData, $vnp_HashSecret);

//     if ($secureHashCheck !== $vnp_SecureHash) {
//         return redirect()->route('checkout.index')->with('error', 'Chữ ký không hợp lệ.');
//     }

//     if ($vnpData['vnp_ResponseCode'] === '00') {
//         $txnRef = $vnpData['vnp_TxnRef'];

//         $pending = PendingTransaction::where('vnp_txn_ref', $txnRef)->first();

//         if (!$pending) {
//             return redirect()->route('checkout')->with('error', 'Không tìm thấy giao dịch.');
//         }

//         // Tạo đơn hàng từ dữ liệu đã lưu
//         $checkoutData = json_decode($pending->checkout_data, true);

//         $order = Order::create([
//             'user_id' => $pending->user_id,
//             'user_email' => $checkoutData['email'],
//             'user_name' => $checkoutData['name'],
//             'user_phone' => $checkoutData['phone'],
//             'user_address' => $checkoutData['address'],
//             'user_note' => $checkoutData['note'] ?? null,
//             'total_price' => $pending->amount,
//             'status_order' => 'đang xử lý',
//             'status_payment' => 'đã thanh toán',
//             'type_payment' => 'vnpay',
//         ]);
//         // Thêm các sản phẩm trong đơn hàng
//         foreach ($checkoutData['items'] as $item) {
//             OrderDetail::create([
//                 'order_id' => $order->id,
//                 'variant_id' => $item['variant_id'],
//                 'variant_price' => $item['price'],
//                 'quantity' => $item['quantity'],
//                 'total_price' => $item['price']*$item['quantity']
//             ]);
//         }

//         // Xóa giỏ hàng
//         if (Auth::check()) {
//             Cart::where('user_id', Auth::id())->delete();
//         } else {
//             session()->forget('cart');
//         }

//         // Xóa giao dịch tạm
//         $pending->delete();
//         session()->forget('checkout_data');
//         session()->forget('vnp_txn_ref');
//         Mail::to($order->user_email)->send(new OrderSuccessMail($order));
//         return redirect()->route('checkout.success',['id' => $order->id])->with('success', 'Thanh toán thành công và đơn hàng đã được tạo.');
//     }

//     return redirect()->route('checkout')->with('error', 'Thanh toán thất bại hoặc bị hủy.');
// }

    public function success($orderId)
    {
        $order = Order::with('OrderDetail.variant.product')->findOrFail($orderId);
        return redirect()->route('orders.index')->with('success', 'Đặt hàng thành công.');
    }
    
    public function continuePayment(Request $request)
    {
        $vnp_TxnRef = $request->query('vnp_TxnRef');
        $transaction = PendingTransaction::where('vnp_txn_ref', $vnp_TxnRef)
            ->where('status', 'pending')
            ->first();

        if (!$transaction || now()->greaterThan($transaction->expires_at)) {
            return redirect()->route('cart.index')->with('error', 'Giao dịch đã hết hạn hoặc không tồn tại.');
        }

        // Khôi phục dữ liệu checkout
        session(['checkout_data' => json_decode($transaction->checkout_data, true)]);

        // Tạo lại URL VNPAY
        return $this->redirectToVNPAY();
    }

    public function show(string $id) {}
    public function create() {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}