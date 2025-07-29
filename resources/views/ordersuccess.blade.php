<h2>ViStar xin chào</h2>
<p>Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi.</p>

<p><strong>Mã đơn hàng:</strong> #{{ $order->id }}</p>
<p><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
<p><strong>Phương thức thanh toán:</strong> {{ $order->type_payment }}</p>

<p>Chúng tôi sẽ sớm liên hệ và giao hàng cho bạn.</p>
<p>Trân trọng,</p>
<p><strong>Đội ngũ cửa hàng</strong></p>
