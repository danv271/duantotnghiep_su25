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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
            $user = User::where('id',$userId)->first();
            $cart = Cart::where('user_id', $userId)
            ->with(['cartItem.variant.product.images' => function ($query) {
                $query->orderBy('id', 'asc')->take(1); // Lấy 1 hình ảnh đầu tiên cho mỗi product
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

        return view('checkout', compact('cartItems', 'subtotal', 'shipping', 'total', 'itemCount', 'userId', 'cart','user'));
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

       // Xử lý dữ liệu giỏ hàng
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())
                ->with(['cartItem.variant'])
                ->first();
            $cartItems = $cart?->cartItem ?? [];
        } else {
            $cartItems = session('cart', []);
        }

        $subtotal = 0;
        if (Auth::check()) {
            foreach ($cartItems as $item) {
                $subtotal += $item->variant->price * $item->quantity;
            }
        } else {
            foreach ($cartItems as $item) {
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
            // Tạo đơn hàng
            $order = Order::create([
                'user_id'  => $userId,
                'user_name' => $request->name,
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
                    session()->push('order_code', $order->id);
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

    // Lấy thông tin từ session checkout_data
$sessionData = session('checkout_data');

if (!$sessionData) {
    return redirect()->route('checkout.index')->with('error', 'Không tìm thấy dữ liệu đơn hàng.');
}

$userId = Auth::check() ? Auth::id() : null;
$cartItems = [];

if ($userId) {
    $cart = Cart::where('user_id', $userId)
        ->with(['cartItem.variant'])
        ->first();
    $cartItems = $cart?->cartItem ?? [];
} else {
    $cartItems = session('cart', []);
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

    $vnpData = $request->all();
    $vnp_SecureHash = $vnpData['vnp_SecureHash'] ?? '';

    unset($vnpData['vnp_SecureHash']);
    unset($vnpData['vnp_SecureHashType']);

    ksort($vnpData);
    $hashData = http_build_query($vnpData, '', '&');
    $secureHashCheck = hash_hmac('sha512', $hashData, $vnp_HashSecret);

    if ($secureHashCheck !== $vnp_SecureHash) {
        return redirect()->route('checkout.index')->with('error', 'Chữ ký không hợp lệ.');
    }

    if ($vnpData['vnp_ResponseCode'] === '00') {
        $txnRef = $vnpData['vnp_TxnRef'];

        $pending = PendingTransaction::where('vnp_txn_ref', $txnRef)->first();

        if (!$pending) {
            return redirect()->route('checkout')->with('error', 'Không tìm thấy giao dịch.');
        }

        // Tạo đơn hàng từ dữ liệu đã lưu
        $checkoutData = json_decode($pending->checkout_data, true);

        $order = Order::create([
            'user_id' => $pending->user_id,
            'user_email' => $checkoutData['email'],
            'user_name' => $checkoutData['name'],
            'user_phone' => $checkoutData['phone'],
            'user_address' => $checkoutData['address'],
            'user_note' => $checkoutData['note'] ?? null,
            'total_price' => $pending->amount,
            'status_order' => 'đang xử lý',
            'status_payment' => 'đã thanh toán',
            'type_payment' => 'vnpay',
        ]);
        // Thêm các sản phẩm trong đơn hàng
        foreach ($checkoutData['items'] as $item) {
            OrderDetail::create([
                'order_id' => $order->id,
                'variant_id' => $item['variant_id'],
                'variant_price' => $item['price'],
                'quantity' => $item['quantity'],
                'total_price' => $item['price']*$item['quantity']
            ]);
        }

        // Xóa giỏ hàng
        if (Auth::check()) {
            Cart::where('user_id', Auth::id())->delete();
        } else {
            session()->forget('cart');
        }

        // Xóa giao dịch tạm
        $pending->delete();
        session()->forget('checkout_data');
        session()->forget('vnp_txn_ref');
        Mail::to($order->user_email)->send(new OrderSuccessMail($order));
        return redirect()->route('checkout.success',['id' => $order->id])->with('success', 'Thanh toán thành công và đơn hàng đã được tạo.');
    }

    return redirect()->route('checkout')->with('error', 'Thanh toán thất bại hoặc bị hủy.');
}


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