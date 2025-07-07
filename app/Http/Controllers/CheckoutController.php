<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Variant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cartItems = [];
        $subtotal = 0;
        $shipping = 30000; // Phí vận chuyển cố định (ví dụ: 30,000 VND)
        $total = 0;
        $itemCount = 0;

        if (Auth::check()) {
            $userId = Auth::id();

            // Lấy danh sách sản phẩm trong giỏ hàng của người dùng đã đăng nhập
            $cart = Cart::where('user_id', $userId)
            ->with(['cartItem.variant.product', 'cartItem.variant.product.images' => function ($query) {
                $query->orderBy('id', 'asc')->first(); // Lấy ảnh đầu tiên của sản phẩm
            }])
            ->first();

            if ($cart && $cart->cartItem) {
            // Chuyển đổi dữ liệu cartItems thành định dạng phù hợp
                $cartItems = $cart->cartItem->map(function ($cartItem) {
                    return (object) [
                        'cart_item_id' => $cartItem->id,
                        'quantity' => $cartItem->quantity,
                        'product_name' => $cartItem->variant->product->name,
                        'variant_price' => $cartItem->variant->price,
                        'max_quantity' => $cartItem->variant->stock_quantity,
                        'image_path' => $cartItem->variant->product->images->first() ? $cartItem->variant->product->images->first()->path : null,
                        'variant_id' => $cartItem->variant->id,
                    ];
                });
            }

            // Tính toán tổng giá trị giỏ hàng
            foreach ($cartItems as $item) {
                $subtotal += $item->variant_price * $item->quantity;
                $itemCount += $item->quantity;
            }
        } else {
            // Lấy giỏ hàng từ session nếu chưa đăng nhập
            $cartItems = session('cart', []);

            foreach ($cartItems as $item) {
                $subtotal += $item['price'] * $item['quantity'];
                $itemCount += $item['quantity'];
            }
        }

        // Tính tổng cộng
        $total = $subtotal + $shipping;

        return view('checkout', compact('cartItems', 'subtotal', 'shipping', 'total', 'itemCount','userId','cart'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'note' => 'nullable|string|max:255',
            'payment_method' => 'required|in:cash,transfer',
            'terms' => 'accepted',
        ]);
            DB::beginTransaction();

            $userId = Auth::check() ? Auth::id() : null;
            $cartItems = [];

            // Lấy giỏ hàng
            if (Auth::check()) {
                $cart = Cart::where('user_id', $userId)
                    ->with('cartItem.variant')
                    ->first();

                if ($cart && $cart->cartItem) {
                    $cartItems = $cart->cartItem;
                }
            } else {
                $cartItems = session('cart', []);
            }

            if (empty($cartItems)) {
                return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống!');
            }

            // Tạo đơn hàng
            $order = Order::create([
                'user_id' => $userId,
                'name' => $request->name,
                'user_email' => $request->email,
                'user_phone' => $request->phone,
                'user_address' => $request->address,
                'user_note' => $request->note,
                'type_payment' => $request->payment_method,
                'status_order' => $request->payment_method === 'cash' ? 'pending' : 'awaiting_payment',
                'total_price' => $request->total, // Sẽ cập nhật sau khi thêm sản phẩm
            ]);

            $subtotal = 0;
            $shipping = 30000; // Phí vận chuyển cố định
            $tax = 0; // Thuế
 
            // Thêm các sản phẩm vào đơn hàng
            if (Auth::check()) {
                foreach ($cartItems as $item) {
                    // Kiểm tra tồn kho
                    if ($item->quantity > $item->variant->stock_quantity) {
                        DB::rollBack();
                        return redirect()->route('cart.index')->with('error', "Số lượng sản phẩm {$item->variant->product->name} vượt quá tồn kho!");
                    }

                    OrderDetail::create([
                        'order_id' => $order->id,
                        'variant_id' => $item->variant_id,
                        'quantity' => $item->quantity,
                        'variant_price' => $item->variant->price,
                        'total_price' => $item->variant->price * $item->quantity,
                    ]);
                    $subtotal += $item->variant->price * $item->quantity;
                }

                // Xóa giỏ hàng sau khi đặt hàng
                CartItem::where('cart_id', $cart->id)->delete();
            } else {
                foreach ($cartItems as $variantId => $item) {
                    $variant = Variant::findOrFail($variantId);
                    if ($item['quantity'] > $variant->stock_quantity) {
                        DB::rollBack();
                        return redirect()->route('cart.index')->with('error', "Số lượng sản phẩm {$item['product_name']} vượt quá tồn kho!");
                    }

                    OrderDetail::create([
                        'order_id' => $order->id,
                        'variant_id' => $variantId,
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                    ]);
                    $subtotal += $item['price'] * $item['quantity'];
                }

                // Xóa giỏ hàng session
                session()->forget('cart');
            }

            // Cập nhật tổng số tiền đơn hàng
            // $order->update(['total' => $subtotal + $shipping + $tax]);

            DB::commit();

            // Nếu chọn thanh toán online, chuyển hướng đến VNPAY
            if ($request->payment_method === 'transfer') {
                return $this->redirectToVNPAY($order);
            }

            return redirect()->route('checkout.success', $order->id)->with('success', 'Đặt hàng thành công!');
    }

    private function redirectToVNPAY($order)
    {
        $vnp_TmnCode = env('VNPAY_TMN_CODE'); // Mã website từ VNPAY
        $vnp_HashSecret = env('VNPAY_HASH_SECRET'); // Chuỗi bí mật từ VNPAY
        $vnp_Url = env('VNPAY_URL', 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html'); // URL Sandbox
        $vnp_ReturnUrl = env('VNPAY_RETURN_URL', 'https://yourwebsite.com/checkout/vnpay-return');

        $vnp_TxnRef = $order->id . '_' . time(); // Mã giao dịch (mã đơn hàng + timestamp)
        $vnp_OrderInfo = 'Thanh toán đơn hàng #' . $order->id;
        $vnp_OrderType = 'order-type';
        $vnp_Amount = $order->total_price * 100; // VNPAY yêu cầu nhân 100
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();
        $vnp_CreateDate = date('YmdHis');
        $vnp_ExpireDate = date('YmdHis', strtotime('+15 minutes'));

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

        ksort($inputData);
        $query = http_build_query($inputData);
        $hashData = '';
        foreach ($inputData as $key => $value) {
            $hashData .= $key . '=' . $value . '&';
        }
        $hashData = rtrim($hashData, '&');

        $vnp_SecureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        $query .= '&vnp_SecureHash=' . $vnp_SecureHash;

        $vnpayUrl = $vnp_Url . '?' . $query;
        return redirect($vnpayUrl);
    }

    /**
     * Xử lý kết quả trả về từ VNPAY
     */
    public function vnpayReturn(Request $request)
    {
        $vnp_HashSecret = env('VNPAY_HASH_SECRET');
        $inputData = $request->all();
        $vnp_SecureHash = $inputData['vnp_SecureHash'] ?? '';
        unset($inputData['vnp_SecureHash']);

        ksort($inputData);
        $hashData = '';
        foreach ($inputData as $key => $value) {
            $hashData .= $key . '=' . $value . '&';
        }
        $hashData = rtrim($hashData, '&');

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        if ($secureHash === $vnp_SecureHash && $inputData['vnp_ResponseCode'] == '00') {
            $orderId = explode('_', $inputData['vnp_TxnRef'])[0];
            Order::where('id', $orderId)->update(['status' => 'paid']);
            return redirect()->route('checkout.success', $orderId)->with('success', 'Thanh toán thành công!');
        } else {
            return redirect()->route('checkout.index')->with('error', 'Thanh toán không thành công hoặc dữ liệu không hợp lệ.');
        }
    }

    /**
     * Trang xác nhận đặt hàng thành công
     */
    public function success($orderId)
    {
        $order = Order::with('orderItems.variant.product')->findOrFail($orderId);
        return view('checkout_success', compact('order'));
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
