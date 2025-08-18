@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-md bg-soft-primary rounded">
                                <iconify-icon icon="solar:cart-5-bold-duotone"
                                    class="avatar-title fs-32 text-primary"></iconify-icon>
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <p class="text-muted mb-0 text-truncate"> Đơn Hàng</p>
                            <h3 class="text-dark mt-1 mb-0">{{ $data['totalOrders'] }}</h3>
                        </div>
                    </div>
                </div>
                <div class="card-footer py-2 bg-light bg-opacity-50">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="{{ $data['growthRate']['trend'] == 'up' ? 'text-success' : 'text-danger' }}">
                                <i class="bx bxs-{{ $data['growthRate']['trend'] }}-arrow fs-12"></i>
                                {{ $data['growthRate']['growth_rate'] }}%</span>
                            <span class="text-muted ms-1 fs-12">Tuần trước </span>
                        </div>
                        <a href="" class="text-reset fw-semibold fs-12">Xem thêm</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-md bg-soft-primary rounded">
                                <i class="bx bx-award avatar-title fs-24 text-primary"></i>
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <p class="text-muted mb-0 text-truncate">Tài khoản mới </p>
                            <h3 class="text-dark mt-1 mb-0">{{ $data['listNewUser'] }}</h3>
                        </div>
                    </div>
                </div>
                <div class="card-footer py-2 bg-light bg-opacity-50">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="{{ $data['growthRateUser']['trend'] == 'up' ? 'text-success' : 'text-danger' }}">
                                <i class="bx bxs-{{ $data['growthRateUser']['trend'] }}-arrow fs-12"></i>
                                {{ $data['growthRateUser']['growth_rate'] }}%</span>
                            <span class="text-muted ms-1 fs-12">Tháng trước</span>
                        </div>
                        <a href="index.html#!" class="text-reset fw-semibold fs-12">Xem thêm</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-md bg-soft-primary rounded">
                                <i class="bx bxs-backpack avatar-title fs-24 text-primary"></i>
                            </div>
                        </div>
                        <div class="col-6 text-end">
                            <p class="text-muted mb-0 text-truncate">Giao dịch </p>
                            <h3 class="text-dark mt-1 mb-0">{{ $data['listDeals'] }}</h3>
                        </div>
                    </div>
                </div>
                <div class="card-footer py-2 bg-light bg-opacity-50">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="{{ $data['growthRateDeals']['trend'] == 'up' ? 'text-success' : 'text-danger' }}">
                                <i class="bx bxs-{{ $data['growthRateDeals']['trend'] }}-arrow fs-12"></i>
                                {{ $data['growthRateDeals']['growth_rate'] }}%</span>
                            <span class="text-muted ms-1 fs-12">Tháng trước</span>
                        </div>
                        <a href="index.html#!" class="text-reset fw-semibold fs-12">Xem thêm</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="avatar-md bg-soft-primary rounded">
                                <i class="bx bx-dollar-circle avatar-title text-primary fs-24"></i>
                            </div>
                        </div>
                        <div class="col-8 text-end">
                            <p class="text-muted mb-0 text-truncate"> Doanh Thu</p>
                            <h3 class="text-dark mt-1 mb-0">{{ $data['tolTalPrice'] }}</h3>
                        </div>
                    </div>
                </div>
                <div class="card-footer py-2 bg-light bg-opacity-50">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="{{ $data['growthRatePrice']['trend'] == 'up' ? 'text-success' : 'text-danger' }}">
                                <i class="bx bxs-{{ $data['growthRatePrice']['trend'] }}-arrow fs-12"></i>
                                {{ $data['growthRatePrice']['growth_rate'] }}%</span>
                            <span class="text-muted ms-1 fs-12">Tháng trước</span>
                        </div>
                        <a href="" class="text-reset fw-semibold fs-12">Xem thêm</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-xxl-5">
            <div class="row">
                <div class="col-md-6">
                    
                </div>

                <div class="col-md-6">
                    
                </div>

                <div class="col-md-6">
                    
                </div>

                <div class="col-md-6">
                    
                </div>
            </div>
        </div> --}}
    </div>
    <div class="row">
        <div class="col-xxl">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Doanh Thu</h4>
                        <div class="chart-controls">
                            <button data-time="1" class="btn btn-sm btn-outline-light btnHandleData">1 tháng</button>
                            <button data-time="6" class="btn btn-sm btn-outline-light btnHandleData">6 tháng</button>
                            <button data-time="12" class="btn btn-sm btn-outline-light btnHandleData">1 năm</button>
                            <button data-time="all" class="btn btn-sm btn-outline-light btnHandleData active">Tất
                                cả</button>
                        </div>
                    </div>
                    <div dir="ltr">
                        <div id="dash-performance-chart" class="apex-charts"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tỉ Lệ Khách Hàng Quay Trở Lại </h5>
                    <div id="conversions" class="apex-charts mb-2 mt-n2"></div>
                    <div class="row text-center">
                        <div class="col-6 lastMonthStats" id="lastMonthStats">
                        </div>
                        <div class="col-6" id="currentMonthStats">
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: 10px">
                        <div id="trendIndicator" class="trend-display"></div>
                        <button type="button" class="btn btn-light shadow-none w-100">View Details</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Các cơ sở</h5>
                    <div id="world-map-markers" style="height: 316px"></div>
                    <div class="row text-center">
                        <div class="col-6">
                            <p class="text-muted mb-2">This Week</p>
                            <h3 class="text-dark mb-3">23.5k</h3>
                        </div>
                        <div class="col-6">
                            <p class="text-muted mb-2">Last Week</p>
                            <h3 class="text-dark mb-3">41.05k</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="col-lg-6">
            <div class="card card-height-100">
                <div class="card-header d-flex align-items-center justify-content-between gap-2">
                    <h4 class="card-title">Thống kê tồn Kho</h4>
                    <a href="javascript:void(0);" class="btn btn-sm btn-soft-primary">View All</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-nowrap table-centered m-0">
                        <thead class="bg-light bg-opacity-50">
                            <tr>
                                <th class="text-muted ps-3">Tên Sản Phẩm </th>
                                <th class="text-muted">Số lượng Hàng tồn </th>
                                <th class="text-muted">Trạng Thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['inventory'] as $item)
                                <tr>
                                    <td class="ps-3"><a href="{{ route('admin.products.detail', $item->product->id) }}"
                                            class="text-muted">{{ $item->product->name }}</a>
                                    </td>
                                    <td>{{ $item->total_stock }}</td>
                                    <td>
                                        <span
                                            class="badge badge-soft-{{ $item->total_stock == 0 ? 'danger' : ($item->total_stock < 5 ? 'warning' : 'success') }}">
                                            @if ($item->total_stock == 0)
                                                Hết hàng
                                            @elseif($item->total_stock < 5)
                                                Gần hết
                                            @else
                                                Còn hàng
                                            @endif
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <div class="mt-3 pagination m-0">
                        {{ $data['inventory']->links() }}
                    </div>
                    <style>
                        /* Apply pagination-rounded style cho Laravel pagination */
                        .pagination {
                            margin: 0;
                        }

                        .pagination .page-link {
                            border: 1px solid #dee2e6;
                            color: #6c757d;
                            padding: 0.5rem 0.75rem;
                            margin: 0 2px;
                            border-radius: 50px;
                            /* Làm tròn như pagination-rounded */
                            transition: all 0.3s ease;
                        }

                        .pagination .page-link:hover {
                            color: #495057;
                            background-color: #e9ecef;
                            border-color: #dee2e6;
                        }

                        /* Style cho nút Previous và Next với Boxicons */
                        .pagination .page-item:first-child .page-link,
                        .pagination .page-item:last-child .page-link {
                            font-size: 0;
                            /* Ẩn text Previous/Next */
                            width: 40px;
                            height: 40px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            border-radius: 50px;
                        }

                        /* Icon Previous */
                        .pagination .page-item:first-child .page-link::before {
                            font-family: 'boxicons';
                            content: "<";
                            /* bx-left-arrow-alt */
                            font-size: 18px;
                            font-weight: normal;
                        }

                        /* Icon Next */
                        .pagination .page-item:last-child .page-link::before {
                            font-family: 'boxicons';
                            content: ">";
                            /* bx-right-arrow-alt */
                            font-size: 18px;
                            font-weight: normal;
                        }

                        /* Active page style */
                        .pagination .page-item.active .page-link {
                            background-color: #ff6c2f;
                            border-color: #ff6c2f;
                            color: white;
                            border-radius: 50px;
                        }

                        /* Disabled state */
                        .pagination .page-item.disabled .page-link {
                            color: #6c757d;
                            background-color: #f8f9fa;
                            border-color: #dee2e6;
                            border-radius: 50px;
                        }

                        /* Alternative: Nếu muốn sử dụng class thay vì pseudo-element */
                        .pagination-rounded .page-link {
                            border-radius: 50px !important;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>

    <!-- Bảng Sản Phẩm -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between gap-2">
                    <h4 class="card-title">Những Sản phẩm bán chạy </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap table-centered m-0">
                            <thead class="bg-light bg-opacity-50">
                                <tr>
                                    <th class="text-muted ps-3">Ảnh</th>
                                    <th class="text-muted">Tên Sản Phẩm </th>
                                    <th class="text-muted">Giá </th>
                                    <th class="text-muted">Đã Bán </th>
                                    <th class="text-muted">Hàng Tồn </th>
                                    <th class="text-muted">Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['bestSellingProducts'] as $item)
                                    <tr>
                                        <td class="ps-3">
                                            <img src="{{ asset('storage/' . $item->variant->product->images->first()->path) }}"
                                                alt="{{ $item->variant->product->name }}" class="img-fluid rounded"
                                                width="50">
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.products.detail', $item->variant->product->id) }}"
                                                class="text-muted">{{ $item->variant->product->name }}</a>
                                        </td>
                                        <td>{{ $item->variant->product->base_price }}</td>
                                        <td>{{ $item->total_quantity }}</td>
                                        <td><span
                                                class="{{ $item->variant->stock_quantity ? 'badge badge-soft-success' : 'badge badge-soft-danger' }}">{{ $item->variant->stock_quantity ? 'Còn Hàng ' : 'Hết Hàng ' }}</span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('admin.products.detail', $item->variant->product->id) }}">View</a>
                                                    </li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('admin.products.edit', $item->variant->product->id) }}">Edit</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Bảng đơn hàng cần sử lí  --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between gap-2">
                    <h4 class="card-title">Những Dơn Hàng Cần Sử Lí </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap table-centered m-0">
                            <thead class="bg-light bg-opacity-50">
                                <tr>
                                    <th class="text-muted ps-3">Mã Đơn Hàng </th>
                                    <th class="text-muted">Ngày Đặt </th>
                                    <th class="text-muted">Khách Hàng </th>
                                    <th class="text-muted">Tổng Tiền </th>
                                    <th class="text-muted">Trạng Thái </th>
                                    <th class="text-muted">Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data['listOrders'] as $index=>$order)
                                    <tr>
                                        <td>#{{ $order->id }}</td>
                                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</td>
                                        <td>
                                            {{ $order->user_name }}
                                        </td>
                                        <td>{{ number_format($order->total_price, 0, ',', '.') }} vnđ</td>
                                        </td>
                                        <td>
                                            <span class="badge border border-secondary text-secondary px-2 py-1 fs-13"
                                                style="cursor: pointer;"
                                                onclick="showStatusForm('{{ $order->id }}', '{{ $order->status_order }}',{{ $index }})">
                                                {{ $order->status_order }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('admin.orders.show', $order->id) }}"
                                                    class="btn btn-light btn-sm">
                                                    Xem chi tiết
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- Modal để cập nhật trạng thái đơn hàng --}}
                                    <div class="modal fade" id="statusModal{{ $index }}" tabindex="-1"
                                        aria-labelledby="statusModalLabel{{ $index }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="statusModalLabel{{ $index }}">Cập
                                                        nhật trạng thái đơn hàng</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form id="statusForm"
                                                    action="{{ route('admin.orders.update-status', $order->id) }}"
                                                    method="POST"> {{-- Đảm bảo route này chính xác --}}
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="order_id" id="orderId">
                                                        <div class="mb-3">
                                                            <label for="status" class="form-label">Trạng thái</label>
                                                            <select name="status" id="status" class="form-select">
                                                                <option
                                                                    {{ $order->status_order == 'đã hủy' ? 'selected' : '' }}
                                                                    value="đã hủy">đã hủy</option>
                                                                <option
                                                                    {{ $order->status_order == 'chờ xử lý' ? 'selected' : '' }}
                                                                    value="chờ xử lý">chờ xử lý</option>
                                                                <option
                                                                    {{ $order->status_order == 'đang xử lý' ? 'selected' : '' }}
                                                                    value="đang xử lý">đang xử lý</option>
                                                                <option
                                                                    {{ $order->status_order == 'chờ vận chuyển' ? 'selected' : '' }}
                                                                    value="chờ vận chuyển">chờ vận chuyển</option>
                                                                <option
                                                                    {{ $order->status_order == 'đang vận chuyển' ? 'selected' : '' }}
                                                                    value="đang vận chuyển">đang vận chuyển</option>
                                                                <option
                                                                    {{ $order->status_order == 'đang giao' ? 'selected' : '' }}
                                                                    value="đang giao">đã giao</option>
                                                                <option
                                                                    {{ $order->status_order == 'giao hàng thành công' ? 'selected' : '' }}
                                                                    value="giao hàng thành công">đã giao</option>
                                                                {{-- Thêm các trạng thái khác nếu có --}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Đóng</button>
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
                        <div class="mt-3 pagination m-0">
                            {{ $data['listOrders']->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between gap-2">
                    <h4 class="card-title">Thống kê doanh thu theo sản phẩm </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap table-centered m-0">
                            <thead class="bg-light bg-opacity-50">
                                <tr>
                                    <th class="text-muted ps-3">Mã Sản Phẩm </th>
                                    <th class="text-muted">Tên Sản Phẩm </th>
                                    <th class="text-muted">Sản Phẩm Bán Ra </th>
                                    <th class="text-muted">Tổng Tiền </th>
                                    <th class="text-muted">Ảnh </th>
                                    <th class="text-muted">Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data['productRevenueStatistics'] as $index=>$product)
                                    <tr>
                                        <td>#{{ $product->id }}</td>
                                        <td>{{ $product->variant->product->name }}</td>
                                        <td>
                                            {{ $product->total_quantity }}
                                        </td>
                                        <td>
                                            {{ number_format($product->total_revenue, 0, ',', '.') }} VNĐ
                                        </td>
                                        <td> <img
                                                src="{{ isset($product->variant->product->images->first()->path) ? asset('storage/' . $item->variant->product->images->first()->path) : asset('images/no-image.png') }}"
                                                alt="{{ $item->variant->product->name }}" class="img-fluid rounded"
                                                width="50">
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('admin.products.detail', $product->variant->product->id) }}"
                                                    class="btn btn-light btn-sm">
                                                    Xem chi tiết
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- Modal để cập nhật trạng thái đơn hàng --}}
                                    <div class="modal fade" id="statusModal{{ $index }}" tabindex="-1"
                                        aria-labelledby="statusModalLabel{{ $index }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="statusModalLabel{{ $index }}">Cập
                                                        nhật trạng thái đơn hàng</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
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
                        <div class="mt-3 pagination m-0">
                            {{ $data['productRevenueStatistics']->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
