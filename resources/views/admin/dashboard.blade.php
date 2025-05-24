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
                                        <iconify-icon icon="solar:cart-5-bold-duotone" class="avatar-title fs-32 text-primary"></iconify-icon>
                                    </div>
                                </div>
                                <div class="col-6 text-end">
                                    <p class="text-muted mb-0 text-truncate">Total Orders</p>
                                    <h3 class="text-dark mt-1 mb-0">13,647</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer py-2 bg-light bg-opacity-50">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-success"><i class="bx bxs-up-arrow fs-12"></i> 2.3%</span>
                                    <span class="text-muted ms-1 fs-12">Last Week</span>
                                </div>
                                <a href="javascript:void(0);" class="text-reset fw-semibold fs-12">View More</a>
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
                                    <p class="text-muted mb-0 text-truncate">New Leads</p>
                                    <h3 class="text-dark mt-1 mb-0">9,526</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer py-2 bg-light bg-opacity-50">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-success"><i class="bx bxs-up-arrow fs-12"></i> 8.1%</span>
                                    <span class="text-muted ms-1 fs-12">Last Month</span>
                                </div>
                                <a href="javascript:void(0);" class="text-reset fw-semibold fs-12">View More</a>
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
                                    <p class="text-muted mb-0 text-truncate">Deals</p>
                                    <h3 class="text-dark mt-1 mb-0">976</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer py-2 bg-light bg-opacity-50">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-danger"><i class="bx bxs-down-arrow fs-12"></i> 0.3%</span>
                                    <span class="text-muted ms-1 fs-12">Last Month</span>
                                </div>
                                <a href="javascript:void(0);" class="text-reset fw-semibold fs-12">View More</a>
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
                                    <p class="text-muted mb-0 text-truncate">Booked Revenue</p>
                                    <h3 class="text-dark mt-1 mb-0">$123.6k</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer py-2 bg-light bg-opacity-50">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-danger"><i class="bx bxs-down-arrow fs-12"></i> 10.6%</span>
                                    <span class="text-muted ms-1 fs-12">Last Month</span>
                                </div>
                                <a href="javascript:void(0);" class="text-reset fw-semibold fs-12">View More</a>
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
                        <h4 class="card-title">Performance</h4>
                        <div>
                            <button type="button" class="btn btn-sm btn-outline-light">ALL</button>
                            <button type="button" class="btn btn-sm btn-outline-light">1M</button>
                            <button type="button" class="btn btn-sm btn-outline-light">6M</button>
                            <button type="button" class="btn btn-sm btn-outline-light active">1Y</button>
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
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Conversions</h5>
                    <div id="conversions" class="apex-charts mb-2 mt-n2"></div>
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
                    <div class="text-center">
                        <button type="button" class="btn btn-light shadow-none w-100">View Details</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Sessions by Country</h5>
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
                    <h4 class="card-title">Top Pages</h4>
                    <a href="javascript:void(0);" class="btn btn-sm btn-soft-primary">View All</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-nowrap table-centered m-0">
                        <thead class="bg-light bg-opacity-50">
                            <tr>
                                <th class="text-muted ps-3">Page Path</th>
                                <th class="text-muted">Page Views</th>
                                <th class="text-muted">Exit Rate</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-3"><a href="javascript:void(0);" class="text-muted">larkon/ecommerce.html</a></td>
                                <td>465</td>
                                <td><span class="badge badge-soft-success">4.4%</span></td>
                            </tr>
                            <tr>
                                <td class="ps-3"><a href="javascript:void(0);" class="text-muted">larkon/dashboard.html</a></td>
                                <td>426</td>
                                <td><span class="badge badge-soft-danger">20.4%</span></td>
                            </tr>
                            <tr>
                                <td class="ps-3"><a href="javascript:void(0);" class="text-muted">larkon/chat.html</a></td>
                                <td>254</td>
                                <td><span class="badge badge-soft-warning">12.25%</span></td>
                            </tr>
                            <tr>
                                <td class="ps-3"><a href="javascript:void(0);" class="text-muted">larkon/auth-login.html</a></td>
                                <td>3,369</td>
                                <td><span class="badge badge-soft-success">5.2%</span></td>
                            </tr>
                            <tr>
                                <td class="ps-3"><a href="javascript:void(0);" class="text-muted">larkon/email.html</a></td>
                                <td>1,208</td>
                                <td><span class="badge badge-soft-info">8.7%</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bảng Sản Phẩm -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between gap-2">
                    <h4 class="card-title">Product List</h4>
                    <a href="{{ url('product-add') }}" class="btn btn-sm btn-primary">Add New Product</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap table-centered m-0">
                            <thead class="bg-light bg-opacity-50">
                                <tr>
                                    <th class="text-muted ps-3">Image</th>
                                    <th class="text-muted">Product Name</th>
                                    <th class="text-muted">Price</th>
                                    <th class="text-muted">Quantity</th>
                                    <th class="text-muted">Status</th>
                                    <th class="text-muted">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="ps-3">
                                        <img src="{{ asset('assets/images/products/product-1.jpg') }}" alt="Product 1" class="img-fluid rounded" width="50">
                                    </td>
                                    <td>
                                        <a href="{{ url('product-details') }}" class="text-muted">Men's Casual Shirt</a>
                                    </td>
                                    <td>$45.00</td>
                                    <td>120</td>
                                    <td><span class="badge badge-soft-success">In Stock</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-dots-horizontal-rounded"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="{{ url('product-details') }}">View</a></li>
                                                <li><a class="dropdown-item" href="{{ url('product-edit') }}">Edit</a></li>
                                                <li><a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-3">
                                        <img src="{{ asset('assets/images/products/product-2.jpg') }}" alt="Product 2" class="img-fluid rounded" width="50">
                                    </td>
                                    <td>
                                        <a href="{{ url('product-details') }}" class="text-muted">Women's Sneakers</a>
                                    </td>
                                    <td>$65.00</td>
                                    <td>45</td>
                                    <td><span class="badge badge-soft-warning">Low Stock</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-dots-horizontal-rounded"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="{{ url('product-details') }}">View</a></li>
                                                <li><a class="dropdown-item" href="{{ url('product-edit') }}">Edit</a></li>
                                                <li><a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-3">
                                        <img src="{{ asset('assets/images/products/product-3.jpg') }}" alt="Product 3" class="img-fluid rounded" width="50">
                                    </td>
                                    <td>
                                        <a href="{{ url('product-details') }}" class="text-muted">Leather Jacket</a>
                                    </td>
                                    <td>$120.00</td>
                                    <td>0</td>
                                    <td><span class="badge badge-soft-danger">Out of Stock</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-dots-horizontal-rounded"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="{{ url('product-details') }}">View</a></li>
                                                <li><a class="dropdown-item" href="{{ url('product-edit') }}">Edit</a></li>
                                                <li><a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-3">
                                        <img src="{{ asset('assets/images/products/product-4.jpg') }}" alt="Product 4" class="img-fluid rounded" width="50">
                                    </td>
                                    <td>
                                        <a href="{{ url('product-details') }}" class="text-muted">Smart Watch</a>
                                    </td>
                                    <td>$199.00</td>
                                    <td>80</td>
                                    <td><span class="badge badge-soft-success">In Stock</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-dots-horizontal-rounded"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="{{ url('product-details') }}">View</a></li>
                                                <li><a class="dropdown-item" href="{{ url('product-edit') }}">Edit</a></li>
                                                <li><a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="ps-3">
                                        <img src="{{ asset('assets/images/products/product-5.jpg') }}" alt="Product 5" class="img-fluid rounded" width="50">
                                    </td>
                                    <td>
                                        <a href="{{ url('product-details') }}" class="text-muted">Bluetooth Headphones</a>
                                    </td>
                                    <td>$89.00</td>
                                    <td>30</td>
                                    <td><span class="badge badge-soft-warning">Low Stock</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-dots-horizontal-rounded"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="{{ url('product-details') }}">View</a></li>
                                                <li><a class="dropdown-item" href="{{ url('product-edit') }}">Edit</a></li>
                                                <li><a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>Showing 1 to 5 of 50 entries</span>
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Example script for initializing charts (to be implemented with ApexCharts or similar)
        document.addEventListener('DOMContentLoaded', function() {
            // Performance Chart
            if (document.getElementById('dash-performance-chart')) {
                // Placeholder for ApexCharts initialization
                console.log('Performance chart initialized');
            }

            // Conversions Chart
            if (document.getElementById('conversions')) {
                // Placeholder for ApexCharts initialization
                console.log('Conversions chart initialized');
            }

            // World Map
            if (document.getElementById('world-map-markers')) {
                // Placeholder for Vector Map initialization
                console.log('World map initialized');
            }
        });
    </script>
@endpush