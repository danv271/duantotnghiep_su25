@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-xxl-5">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary text-truncate mb-3" role="alert">
                        We regret to inform you that our server is currently experiencing technical difficulties.
                    </div>
                </div>

                <div class="col-md-6">
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
                                    <h3 class="text-dark mt-1 mb-0">{{ $data['tolTalOrders'] }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
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
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-md bg-soft-primary rounded">
                                        <i class="bx bxs-backpack avatar-title fs-24 text-primary"></i>
                                    </div>
                                </div>
                                <div class="col-6 text-end">
                                    <p class="text-muted mb-0 text-truncate">Mã giảm giá </p>
                                    <h3 class="text-dark mt-1 mb-0">{{ $data['listCoupon'] }}</h3>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-md bg-soft-primary rounded">
                                        <i class="bx bx-dollar-circle avatar-title text-primary fs-24"></i>
                                    </div>
                                </div>
                                <div class="col-6 text-end">
                                    <p class="text-muted mb-0 text-truncate"> Doanh Thu</p>
                                    <h3 class="text-dark mt-1 mb-0">{{ $data['tolTalPrice'] }} vnđ</h3>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-7">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Doanh thu </h4>
                    </div>
                    <div dir="ltr">
                        <div id="dash-performance-chart" class="apex-charts"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tỉ Lệ Hoàn Thành Đơn Hàng </h5>
                    <div id="conversions" class="apex-charts mb-2 mt-n2"></div>
                    <div class="row text-center">
                        <div class="col-6">
                            <p class="text-muted mb-2">Đơn hàng đang xử lí </p>
                            <h3 class="text-dark mb-3"id="handleOrder"></h3>
                        </div>
                        <div class="col-6">
                            <p class="text-muted mb-2">Đơn Hủy</p>
                            <h3 class="text-dark mb-3"id="failOrder"></h3>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="button" class="btn btn-light shadow-none w-100">View Details</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
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
        </div>

        <div class="col-lg-4">
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
                                <th class="text-muted">Exit Rate</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($data['inventory'] as $item)
                                <tr>
                                    <td class="ps-3"><a href="javascript:void(0);"
                                            class="text-muted">{{ $inventory->where('product_id', $item['product_id'])->first()->product->name }}</a>
                                    </td>
                                    <td>465</td>
                                    <td><span class="badge badge-soft-success">4.4%</span></td>
                                </tr>
                            @endforeach --}}
                            <tr>
                                <td class="ps-3"><a href="javascript:void(0);"
                                        class="text-muted">larkon/dashboard.html</a></td>
                                <td>426</td>
                                <td><span class="badge badge-soft-danger">20.4%</span></td>
                            </tr>
                            <tr>
                                <td class="ps-3"><a href="javascript:void(0);" class="text-muted">larkon/chat.html</a>
                                </td>
                                <td>254</td>
                                <td><span class="badge badge-soft-warning">12.25%</span></td>
                            </tr>
                            <tr>
                                <td class="ps-3"><a href="javascript:void(0);"
                                        class="text-muted">larkon/auth-login.html</a></td>
                                <td>3,369</td>
                                <td><span class="badge badge-soft-success">5.2%</span></td>
                            </tr>
                            <tr>
                                <td class="ps-3"><a href="javascript:void(0);" class="text-muted">larkon/email.html</a>
                                </td>
                                <td>1,208</td>
                                <td><span class="badge badge-soft-info">8.7%</span></td>
                            </tr>
                        </tbody>

                    </table>
                    <div class="mt-3 pagination m-0">
                        {{ $data['inventory']->links() }}
                    </div>
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
@endsection
