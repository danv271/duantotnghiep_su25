@extends('admin.layout') {{-- Đảm bảo bạn đang extend đúng layout của admin --}}

@section('title', 'Trang Đơn Hàng | Larkon - Responsive Admin Dashboard Template')
@section('page-title', 'Danh sách đơn hàng') {{-- Hoặc tùy chỉnh tiêu đề trang --}}

@section('content')
<div class="page-content" style="margin: 0px">

    <div class="container-xxl">

        {{-- Phần Dashboard Thống Kê Đơn Hàng --}}
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="card-title mb-2">Payment Refund</h4>
                                <p class="text-muted fw-medium fs-22 mb-0">490</p>
                            </div>
                            <div>
                                <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                    <iconify-icon icon="solar:chat-round-money-broken"
                                        class="fs-32 text-primary avatar-title"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="card-title mb-2">Order Cancel</h4>
                                <p class="text-muted fw-medium fs-22 mb-0">241</p>
                            </div>
                            <div>
                                <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                    <iconify-icon icon="solar:cart-cross-broken"
                                        class="fs-32 text-primary avatar-title"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="card-title mb-2">Order Shipped</h4>
                                <p class="text-muted fw-medium fs-22 mb-0">630</p>
                            </div>
                            <div>
                                <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                    <iconify-icon icon="solar:box-broken"
                                        class="fs-32 text-primary avatar-title"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="card-title mb-2">Order Delivering</h4>
                                <p class="text-muted fw-medium fs-22 mb-0">170</p>
                            </div>
                            <div>
                                <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                    <iconify-icon icon="solar:tram-broken"
                                        class="fs-32 text-primary avatar-title"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="card-title mb-2">Pending Review</h4>
                                <p class="text-muted fw-medium fs-22 mb-0">210</p>
                            </div>
                            <div>
                                <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                    <iconify-icon icon="solar:clipboard-remove-broken"
                                        class="fs-32 text-primary avatar-title"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="card-title mb-2">Pending Payment</h4>
                                <p class="text-muted fw-medium fs-22 mb-0">608</p>
                            </div>
                            <div>
                                <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                    <iconify-icon icon="solar:clock-circle-broken"
                                        class="fs-32 text-primary avatar-title"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="card-title mb-2">Delivered</h4>
                                <p class="text-muted fw-medium fs-22 mb-0">200</p>
                            </div>
                            <div>
                                <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                    <iconify-icon icon="solar:clipboard-check-broken"
                                        class="fs-32 text-primary avatar-title"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h4 class="card-title mb-2">In Progress</h4>
                                <p class="text-muted fw-medium fs-22 mb-0">656</p>
                            </div>
                            <div>
                                <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                    <iconify-icon icon="solar:inbox-line-broken"
                                        class="fs-32 text-primary avatar-title"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Kết thúc phần Dashboard Thống Kê --}}

        {{-- Phần Bảng Danh Sách Đơn Hàng Động --}}
        <div class="row mt-4">
            <div class="col-xl-12">
                <div class="card">
                    <div class="d-flex card-header justify-content-between align-items-center">
                        <div>
                            <h4 class="card-title">Tất cả đơn hàng</h4> {{-- Thay đổi tiêu đề bảng --}}
                        </div>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle btn btn-sm btn-outline-light rounded"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Tháng này
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#!" class="dropdown-item">Download</a>
                                <a href="#!" class="dropdown-item">Export</a>
                                <a href="#!" class="dropdown-item">Import</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        {{-- Form Tìm Kiếm --}}
                        <form method="GET" class="mb-4 d-flex justify-content-center p-3">
                            <input type="text" name="search" placeholder="Tìm theo email hoặc SĐT" value="{{ request('search') }}"
                                class="form-control me-2 w-50" aria-label="Search">
                            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                        </form>

                        <div class="table-responsive">
                            <table class="table align-middle mb-0 table-hover table-centered">
                                <thead class="bg-light-subtle">
                                    <tr>
                                        <th>Mã Đơn Hàng</th>
                                        <th>Ngày đặt</th>
                                        <th>Khách hàng / Email</th>
                                        <th>SĐT</th>
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái thanh toán</th>
                                        <th>Trạng thái đơn hàng</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $order)
                                    <tr>
                                        <td>#{{ $order->id }}</td>
                                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <a href="javascript:void(0);" class="link-primary fw-medium">{{ $order->user_email }}</a>
                                        </td>
                                        <td>{{ $order->user_phone }}</td>
                                        <td>{{ number_format($order->total_price) }} đ</td>
                                        <td>
                                            @if($order->status_payment == 'unpaid')
                                                <span class="badge bg-danger">Chưa thanh toán</span>
                                            @elseif($order->status_payment == 'paid')
                                                <span class="badge bg-success">Đã thanh toán</span>
                                            @elseif($order->status_payment == 'refunded')
                                                <span class="badge bg-secondary">Đã hoàn tiền</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{-- Sử dụng hàm JS để mở modal cập nhật trạng thái --}}
                                            <span class="badge border border-secondary text-secondary px-2 py-1 fs-13"
                                                style="cursor: pointer;" onclick="showStatusForm('{{ $order->id }}', '{{ $order->status_order }}')">
                                                @if($order->status_order == 'pending')
                                                    Chờ xử lý
                                                @elseif($order->status_order == 'processing')
                                                    Đang xử lý
                                                @elseif($order->status_order == 'shipped')
                                                    Đã giao hàng
                                                @elseif($order->status_order == 'completed')
                                                    Hoàn thành
                                                @elseif($order->status_order == 'cancelled')
                                                    Đã hủy
                                                @else
                                                    {{ ucfirst($order->status_order) }} {{-- Trường hợp trạng thái khác --}}
                                                @endif
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-light btn-sm">
                                                    <iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon>
                                                </a>
                                                {{-- Nếu có route edit, giữ lại --}}
                                                {{-- <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-light btn-sm text-warning">
                                                    <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon>
                                                </a> --}}
                                                {{-- Form xóa --}}
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
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Không có đơn hàng nào.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        </div>
                    <div class="card-footer border-top">
                        {{-- Phần phân trang --}}
                        <div class="mt-4">
                            {{ $orders->withQueryString()->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Kết thúc phần Bảng Danh Sách Đơn Hàng --}}

    </div>
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <script>
                        document.write(new Date().getFullYear())
                    </script>2025 © Larkon. Crafted by <iconify-icon icon="iconamoon:heart-duotone"
                        class="fs-18 align-middle text-danger"></iconify-icon> <a
                        href="https://1.envato.market/techzaa" class="fw-bold footer-text"
                        target="_blank">Techzaa</a>
                </div>
            </div>
        </div>
    </footer>
    {{-- Modal để cập nhật trạng thái đơn hàng --}}
    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Cập nhật trạng thái đơn hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="statusForm" action="/update-status" method="POST"> {{-- Đảm bảo route này chính xác --}}
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="order_id" id="orderId">
                        <div class="mb-3">
                            <label for="status" class="form-label">Trạng thái</label>
                            <select name="status" id="status" class="form-select">
                                <option value="pending">Chờ xử lý</option>
                                <option value="processing">Đang xử lý</option>
                                <option value="shipped">Đã giao hàng</option>
                                <option value="completed">Hoàn thành</option>
                                <option value="cancelled">Đã hủy</option>
                                {{-- Thêm các trạng thái khác nếu có --}}
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function showStatusForm(orderId, currentStatus) {
        document.getElementById('orderId').value = orderId;
        document.getElementById('status').value = currentStatus; // Chọn trạng thái hiện tại
        var modal = new bootstrap.Modal(document.getElementById('statusModal'));
        modal.show();
    }
</script>
@endsection