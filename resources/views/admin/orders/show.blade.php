@extends('admin.layouts.app')

@section('title', 'Chi tiết đơn hàng #' . $order->id)
@section('title_topbar', 'Chi tiết đơn hàng #' . $order->id)

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header text-center">
            <h2 class="mb-0">Chi tiết đơn hàng #{{ $order->id }}</h2>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h3 class="font-semibold text-lg text-gray-800">Thông tin khách hàng</h3>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Email:</strong> {{ $order->user_email }}</li>
                        <li class="list-group-item"><strong>Số điện thoại:</strong> {{ $order->user_phone }}</li>
                        <li class="list-group-item"><strong>Địa chỉ:</strong> {{ $order->user_address }}</li>
                        @if($order->user_note)
                        <li class="list-group-item"><strong>Ghi chú:</strong> {{ $order->user_note }}</li>
                        @endif
                    </ul>
                </div>

                <div class="col-md-6">
                    <h3 class="font-semibold text-lg text-gray-800">Thông tin đơn hàng</h3>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Trạng thái đơn hàng:</strong>
                            @if($order->status_order == 'pending')
                                <span class="badge bg-warning text-dark">Chờ xử lý</span>
                            @elseif($order->status_order == 'processing')
                                <span class="badge bg-info text-dark">Đang xử lý</span>
                            @elseif($order->status_order == 'shipped')
                                <span class="badge bg-primary">Đã giao hàng</span>
                            @elseif($order->status_order == 'completed')
                                <span class="badge bg-success">Hoàn thành</span>
                            @elseif($order->status_order == 'cancelled')
                                <span class="badge bg-danger">Đã hủy</span>
                            @elseif($order->status_order == 'refunded')
                                <span class="badge bg-secondary">Đã hoàn tiền</span>
                            @endif
                        </li>
                        <li class="list-group-item"><strong>Trạng thái thanh toán:</strong>
                            @if($order->status_payment == 'unpaid')
                                <span class="badge bg-danger">Chưa thanh toán</span>
                            @elseif($order->status_payment == 'paid')
                                <span class="badge bg-success">Đã thanh toán</span>
                            @elseif($order->status_payment == 'refunded')
                                <span class="badge bg-secondary">Đã hoàn tiền</span>
                            @endif
                        </li>
                        <li class="list-group-item"><strong>Phương thức thanh toán:</strong> {{ $order->type_payment == 'cod' ? 'Thanh toán khi nhận hàng' : ($order->type_payment == 'bank_transfer' ? 'Chuyển khoản ngân hàng' : 'Thẻ tín dụng') }}</li>
                        <li class="list-group-item"><strong>Tổng tiền:</strong> {{ number_format($order->total_price) }} đ</li>
                        <li class="list-group-item"><strong>Ngày đặt:</strong> {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i') }}</li>
                        <li class="list-group-item"><strong>Cập nhật lần cuối:</strong> {{ \Carbon\Carbon::parse($order->updated_at)->format('d/m/Y H:i') }}</li>
                    </ul>
                </div>
            </div>


        </div>
        <div class="card-footer text-center">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">Quay lại danh sách</a>
        </div>
    </div>
</div>
@endsection
