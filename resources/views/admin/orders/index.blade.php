@extends('admin.layouts.app') {{-- Đảm bảo bạn đang extend đúng layout của admin --}}

@section('title', 'Trang Đơn Hàng | Larkon - Responsive Admin Dashboard Template')
@section('page-title', 'Danh sách đơn hàng') {{-- Hoặc tùy chỉnh tiêu đề trang --}}

@section('content')
<div class="page-content" style="margin: 0px">

    <div class="container">
        
        {{-- Phần Dashboard Thống Kê Đơn Hàng --}}
        <div class="row p-0">
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
            <div class="col-xl-12 p-0">
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
                        <form action="" method="POST">
                            <div class="row  mt-2">
                                <div class="col-11">
                                    <input type="text" name="search" placeholder="Tìm theo email hoặc SĐT" value="{{ request('search') }}"
                                    class="form-control ms-2" aria-label="Search">
                                </div>
                                <div class="col-1">
                                    <button type="submit" class="btn btn-primary">Tìm</button>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table align-middle mb-0 table-hover table-centered">
                                <thead class="bg-light-subtle">
                                    <tr>
                                        <th>Mã</th>
                                        <th>Ngày đặt</th>
                                        <th>Khách hàng</th>
                                        <th>Tổng tiền</th>
                                        <th>Thanh toán</th>
                                        <th>Mặt hàng</th>
                                        <th>Số giao hàng</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $index=>$order)
                                        <tr>
                                            <td>#{{ $order->id }}</td>
                                            <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</td>
                                            <td>
                                                {{ $order->user_name }}
                                            </td>
                                            <td>{{ number_format($order->total_price,0,',','.') }} vnđ</td>
                                            <td>
                                                {{$order->status_payment}}
                                            </td>
                                            <td>1</td>
                                            <td>{{$order->user_phone}}</td>
                                            <td>
                                                {{-- Sử dụng hàm JS để mở modal cập nhật trạng thái --}}
                                                <span class="badge border border-secondary text-secondary px-2 py-1 fs-13"
                                                    style="cursor: pointer;" onclick="showStatusForm('{{ $order->id }}', '{{ $order->status_order }}',{{$index}})">
                                                    {{$order->status_order}}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-light btn-sm">
                                                        Xem chi tiết
                                                    </a>
                                                    {{-- Nếu có route edit, giữ lại --}}
                                                    {{-- <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-light btn-sm text-warning">
                                                        <iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon>
                                                    </a> --}}
                                                    {{-- Form xóa --}}
                                                    {{-- <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="mb-0">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link text-danger p-0" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')">
                                                            <iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="fs-5"></iconify-icon>
                                                        </button>
                                                    </form> --}}
                                                </div>
                                            </td>
                                        </tr>
                                        {{-- Modal để cập nhật trạng thái đơn hàng --}}
                                        <div class="modal fade" id="statusModal{{$index}}" tabindex="-1" aria-labelledby="statusModalLabel{{$index}}"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="statusModalLabel{{$index}}">Cập nhật trạng thái đơn hàng</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form id="statusForm" action="{{route('admin.orders.update-status',$order->id)}}" method="POST"> {{-- Đảm bảo route này chính xác --}}
                                                        <div class="modal-body">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="order_id" id="orderId">
                                                            <div class="mb-3">
                                                                <label for="status" class="form-label">Trạng thái</label>
                                                                <select name="status" id="status" class="form-select">
                                                                    <option {{$order->status_order == 'đã hủy' ? 'selected':''}} value="đã hủy">đã hủy</option>
                                                                    <option {{$order->status_order == 'chờ xử lý' ? 'selected':''}} value="chờ xử lý">chờ xử lý</option>
                                                                    <option {{$order->status_order == 'đang xử lý' ? 'selected':''}} value="đang xử lý">đang xử lý</option>
                                                                    <option {{$order->status_order == 'chờ vận chuyển' ? 'selected':''}} value="chờ vận chuyển">chờ vận chuyển</option>
                                                                    <option {{$order->status_order == 'đang vận chuyển' ? 'selected':''}} value="đang vận chuyển">đang vận chuyển</option>
                                                                    <option {{$order->status_order == 'đang giao' ? 'selected':''}} value="đang giao">đã giao</option>
                                                                    <option {{$order->status_order == 'giao hàng thành công' ? 'selected':''}} value="giao hàng thành công">đã giao</option>
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
</div>

<script>
    // hàm hiển thị biểu mẫu trạng thái đơn hàng
    function showStatusForm(orderId, currentStatus,index) {
        // gán giá trị cho phần tử có id 'orderId'
        // document.getElementById('orderId').value = orderId;
        // // 
        // document.getElementById('status').value = currentStatus; // Chọn trạng thái hiện tại
        var modal = new bootstrap.Modal(document.getElementById('statusModal'+index));
        modal.show();
    }
</script>
@endsection