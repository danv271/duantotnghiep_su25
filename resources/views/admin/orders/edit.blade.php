@extends('admin.layouts.app')

@section('title', 'Cập nhật đơn hàng #' . $order->id)
@section('title_topbar', 'Cập nhật đơn hàng #' . $order->id)

@section('content')

<div class="container mt-5">
    <div class="bg-light p-4 rounded shadow-sm max-w-3xl mx-auto">
        <h2 class="text-center mb-4">Cập nhật đơn hàng #{{ $order->id }}</h2>

        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="status_order" class="form-label">Trạng thái đơn hàng</label>
                <select name="status_order" id="status_order" class="form-select" required>
                    <option value="pending" {{ $order->status_order == 'pending' ? 'selected' : '' }}>Chờ xử lý</option>
                    <option value="processing" {{ $order->status_order == 'processing' ? 'selected' : '' }}>Đang xử lý</option>
                    <option value="shipped" {{ $order->status_order == 'shipped' ? 'selected' : '' }}>Đã giao hàng</option>
                    <option value="completed" {{ $order->status_order == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
                    <option value="cancelled" {{ $order->status_order == 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="status_payment" class="form-label">Trạng thái thanh toán</label>
                <select name="status_payment" id="status_payment" class="form-select" required>
                    <option value="unpaid" {{ $order->status_payment == 'unpaid' ? 'selected' : '' }}>Chưa thanh toán</option>
                    <option value="paid" {{ $order->status_payment == 'paid' ? 'selected' : '' }}>Đã thanh toán</option>
                    <option value="refunded" {{ $order->status_payment == 'refunded' ? 'selected' : '' }}>Đã hoàn tiền</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="type_payment" class="form-label">Phương thức thanh toán</label>
                <input type="text" id="type_payment" value="{{ $order->type_payment == 'cod' ? 'Thanh toán khi nhận hàng' : ($order->type_payment == 'bank_transfer' ? 'Chuyển khoản ngân hàng' : 'Thẻ tín dụng') }}" class="form-control" readonly>
            </div>

            <div class="mb-3">
                <label for="user_note" class="form-label">Ghi chú của khách hàng</label>
                <textarea name="user_note" id="user_note" rows="3" class="form-control" readonly>{{ $order->user_note }}</textarea>
            </div>

            <div class="mb-3">
                <label for="user_address" class="form-label">Địa chỉ giao hàng</label>
                <input type="text" name="user_address" id="user_address" value="{{ $order->user_address }}" class="form-control" readonly>
            </div>

            <div class="mb-3">
                <label for="user_email" class="form-label">Email khách hàng</label>
                <input type="email" name="user_email" id="user_email" value="{{ $order->user_email }}" class="form-control" readonly>
            </div>

            <div class="mb-3">
                <label for="user_phone" class="form-label">Số điện thoại khách hàng</label>
                <input type="text" name="user_phone" id="user_phone" value="{{ $order->user_phone }}" class="form-control" readonly>
            </div>

            <div class="mb-4">
                <label for="total_price" class="form-label">Tổng tiền</label>
                <input type="text" name="total_price" id="total_price" value="{{ number_format($order->total_price) }} đ" class="form-control" readonly>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Cập nhật đơn hàng</button>
            </div>
        </form>
    </div>
</div>

@endsection
