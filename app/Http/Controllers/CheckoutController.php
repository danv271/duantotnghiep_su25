<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\PaymentTransaction;
use App\Models\Variant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = [];
        $subtotal = 0;
        $shipping = 30000; // phí vận chuyển cố định
        $total = 0;
        $itemCount = 0;

        $userId = null;

        if (Auth::check()) {
            $userId = Auth::id();

            $cart = Cart::where('user_id', $userId)
                ->with(['cartItem.variant.product', 'cartItem.variant.product.images' => function ($query) {
                    $query->orderBy('id', 'asc')->first();
                }])
                ->first();

            if ($cart && $cart->cartItem) {
                $cartItems = $cart->cartItem->map(function ($cartItem) {
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

        return view('checkout', compact('cartItems', 'subtotal', 'shipping', 'total', 'itemCount', 'userId', 'cart'));
        } else {
            $cartItems = session('cart', []);

            foreach ($cartItems as $item) {
                $subtotal += $item['price'] * $item['quantity'];
                $itemCount += $item['quantity'];
            }
            $total = $subtotal + $shipping;

            return view('checkout', compact('cartItems', 'subtotal', 'shipping', 'total', 'itemCount', 'userId'));
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
            'terms' => 'accepted',
        ]);

        // Lưu dữ liệu đơn hàng tạm vào session (hoặc cache)
        session([
            'checkout_data' => $request->all()
        ]);

        if ($request->payment_method === 'transfer') {
            return $this->redirectToVNPAY();
        }
        // Nếu chọn thanh toán tiền mặt (cash) → thực hiện lên đơn ngay
        $userId = Auth::check() ? Auth::id() : null;
        $cartItems = [];

        if (Auth::check()) {
            $cart = Cart::where('user_id', $userId)
                ->with('cartItem.variant.product')
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

        DB::beginTransaction();

        try {
            // Tạo đơn hàng
            $order = Order::create([
                'user_id' => $userId,
                'name' => $request->name,
                'user_email' => $request->email,
                'user_phone' => $request->phone,
                'user_address' => $request->address,
                'user_note' => $request->note,
                'type_payment' => $request->payment_method,
                'total_price' => $request->total,
            ]);

            $subtotal = 0;

            if (Auth::check()) {
                foreach ($cartItems as $item) {
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

                // Xóa giỏ hàng
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
                        'variant_price' => $item['price'],
                        'total_price' => $item['price'] * $item['quantity'],
                    ]);

                    $subtotal += $item['price'] * $item['quantity'];
                }

                session()->forget('cart');
            }

            // Nếu bạn có bảng payments → thêm record vào đây
            Payment::create([
                'order_id' => $order->id,
                'payment_method' => 'cash',
                'amount' => $order->total_price,
                'payment_date' => now(),
            ]);

            DB::commit();

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

        if (!$checkoutData) {
            return redirect()->route('checkout.index')->with('error', 'Không tìm thấy dữ liệu đơn hàng.');
        }

        // Tính lại tổng tiền từ giỏ hàng
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

        $shipping = 30000;
        $total = $subtotal + $shipping;

        // Chuẩn bị dữ liệu gửi sang VNPAY
        $vnp_TxnRef = uniqid(); // Mã giao dịch ngẫu nhiên (vì chưa có order_id)
        $vnp_OrderInfo = 'Thanh toán đơn hàng';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $total * 100; // nhân 100 theo chuẩn VNPAY
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

        ksort($inputData);
        $hashData = http_build_query($inputData, '', '&');
        $vnp_SecureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        $query = http_build_query($inputData, '', '&');
        $vnpayUrl = $vnp_Url . '?' . $query . '&vnp_SecureHash=' . $vnp_SecureHash;

        // Lưu tạm mã giao dịch để tra cứu về sau
        session(['vnp_txn_ref' => $vnp_TxnRef]);

        return redirect($vnpayUrl);
    }

    public function vnpayReturn(Request $request)
    {
        $vnp_HashSecret = env('VNPAY_HASH_SECRET');

        // Loại bỏ hash khỏi dữ liệu
        $inputData = $request->except(['vnp_SecureHash', 'vnp_SecureHashType']);

        // Sắp xếp theo thứ tự key
        ksort($inputData);

        // Tạo chuỗi hash đúng chuẩn VNPAY
        $hashData = http_build_query($inputData, '', '&');

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

        if ($secureHash === $request->input('vnp_SecureHash') && $request->input('vnp_ResponseCode') == '00') {
            $userId = Auth::check() ? Auth::id() : null;
            $cart = $userId ? Cart::where('user_id', $userId)->with('cartItem.variant.product')->first() : null;

            if (!$cart || $cart->cartItem->isEmpty()) {
                return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống!');
            }

            $checkoutData = session('checkout_data');
            if (!$checkoutData) {
                return redirect()->route('cart.index')->with('error', 'Không tìm thấy dữ liệu đơn hàng.');
            }

            DB::beginTransaction();

            $order = Order::create([
                'user_id' => $userId,
                'name' => $checkoutData['name'],
                'user_email' => $checkoutData['email'],
                'user_phone' => $checkoutData['phone'],
                'user_address' => $checkoutData['address'],
                'user_note' => $checkoutData['note'],
                'type_payment' => 'transfer',
                'status_order' => 'pending',
                'status_payment' => 'paid',
                'total_price' => $checkoutData['total'],
            ]);

            foreach ($cart->cartItem as $item) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'variant_id' => $item->variant_id,
                    'quantity' => $item->quantity,
                    'variant_price' => $item->variant->price,
                    'total_price' => $item->variant->price * $item->quantity,
                ]);
            }

            // Xóa giỏ hàng
            CartItem::where('cart_id', $cart->id)->delete();

            DB::commit();
            $payment = Payment::create([
                'order_id' => $order->id,
                'payment_method' => 'vnpay',
                'amount' => $checkoutData['total'],
                'payment_date' => now(),
            ]);

            // Thêm bản ghi vào bảng payment_transactions
            PaymentTransaction::create([
                'payment_id' => $payment->id,
                'order_id' => $order->id,
                'gateway' => 'vnpay',
                'transaction_status' => 'success ',
                'amount' => $checkoutData['total'],
                'currency' => 'VND',
                'transaction_date' => now(),
                'response_transaction' => json_encode($request->all(), JSON_UNESCAPED_UNICODE),
            ]);
            session()->forget('checkout_data');

            return redirect()->route('checkout.success', $order->id)->with('success', 'Thanh toán thành công!');
        }

        return redirect()->route('checkout')->with('error', 'Thanh toán không thành công hoặc dữ liệu không hợp lệ.');
    }

    public function success($orderId)
    {
        $order = Order::with('OrderDetail.variant.product')->findOrFail($orderId);
        return redirect()->route('orders.index')->with('success', 'Đặt hàng thành công.');
    }

    public function show(string $id) {}
    public function create() {}
    public function edit(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}
