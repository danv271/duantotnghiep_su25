@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- Start Container Fluid -->
    <div class="container-fluid">

        <!-- Start here.... -->
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
                                        <h3 class="text-dark mt-1 mb-0">13, 647</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer py-2 bg-light bg-opacity-50">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <span class="text-success"> <i class="bx bxs-up-arrow fs-12"></i> 2.3%</span>
                                        <span class="text-muted ms-1 fs-12">Last Week</span>
                                    </div>
                                    <a href="index.html#!" class="text-reset fw-semibold fs-12">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Thêm các card khác (New Leads, Deals, Booked Revenue) từ HTML gốc -->
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

        <!-- Thêm các row khác (Conversions, Sessions by Country, Top Pages, Recent Orders) từ HTML gốc -->
    </div>
    <!-- End Container Fluid -->
@endsection