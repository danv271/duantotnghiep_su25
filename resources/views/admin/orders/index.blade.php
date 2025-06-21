@extends('admin.layouts.app')

@section('title', 'Danh sách đơn hàng')
@section('title_topbar', 'Danh sách đơn hàng')

@section('content')
<div class="container mt-5">
    <div class="bg-light p-4 rounded shadow-sm">
        <h2 class="text-center mb-4">Danh sách đơn hàng</h2>

        <form method="GET" class="mb-4 d-flex justify-content-center">
            <input type="text" name="search" placeholder="Tìm theo email hoặc SĐT" value="{{ request('search') }}"
                class="form-control me-2 w-50" aria-label="Search">
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-secondary">
                    <tr>
                        <th>Mã Đơn Hàng</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Thanh toán</th>
                        <th>Ngày đặt</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user_email }}</td>
                        <td>{{ $order->user_phone }}</td>
                        <td>{{ number_format($order->total_price) }} đ</td>
                        <td>
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
                            @endif
                        </td>
                        <td>
                            @if($order->status_payment == 'unpaid')
                                <span class="badge bg-danger">Chưa thanh toán</span>
                            @elseif($order->status_payment == 'paid')
                                <span class="badge bg-success">Đã thanh toán</span>
                            @elseif($order->status_payment == 'refunded')
                                <span class="badge bg-secondary">Đã hoàn tiền</span>
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="text-primary">
                                    <iconify-icon icon="solar:eye-broken" class="fs-5"></iconify-icon>
                                </a>
                                <a href="{{ route('admin.orders.edit', $order->id) }}" class="text-warning">
                                    <iconify-icon icon="solar:pen-2-broken" class="fs-5"></iconify-icon>
                                </a>
                                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="mb-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger p-0" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')">
                                        <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="fs-5"></iconify-icon>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $orders->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
