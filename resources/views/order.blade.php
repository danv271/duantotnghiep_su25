{{-- @extends('layouts.app')

@section('title', 'Account - eStore')

@section('body-class', 'account-page')

@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Đơn hàng</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li class="current">Account</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Account Section -->
        <section id="account" class="account section">

            <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <div class="row g-4">
                    <!-- Content Area -->
                    <div class="col-lg-12">
                        <div class="content-area">
                            <div class="tab-content">
                                <!-- Orders Tab -->
                                    <div class="section-header aos-init aos-animate" data-aos="fade-up">
                                        <h2></h2>
                                        <div class="header-actions">
                                            <div class="search-box">
                                                <i class="bi bi-search"></i>
                                                <input type="text" placeholder="Search orders...">
                                            </div>
                                            <div class="dropdown">
                                                <button class="filter-btn" data-bs-toggle="dropdown">
                                                    <i class="bi bi-funnel"></i>
                                                    <span>Filter</span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">All Orders</a></li>
                                                    <li><a class="dropdown-item" href="#">Processing</a></li>
                                                    <li><a class="dropdown-item" href="#">Shipped</a></li>
                                                    <li><a class="dropdown-item" href="#">Delivered</a></li>
                                                    <li><a class="dropdown-item" href="#">Cancelled</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="orders-grid">
                                        <!-- Order Card 1 -->
                                        @foreach ($orders as $order)
                                            <div class="order-card aos-init aos-animate" data-aos="fade-up"
                                                data-aos-delay="100">
                                                <div class="order-header">
                                                    <div class="order-id">
                                                        <span class="label">Mã đơn hàng:{{ $order->id }}</span>
                                                    </div>
                                                    <div class="order-date">{{ $order->created_at }}</div>
                                                </div>
                                                <div class="order-content">
                                                    <div class="order-info">
                                                        <div class="info-row">
                                                            <span>Trạng thái</span>
                                                            <span class="status processing">
                                                                @if($order->status_order == 'pending')
                                                                    chưa xác nhận
                                                                @endif
                                                            </span>
                                                        </div>
                                                        <div class="info-row">
                                                            <span>Sản phẩm</span>
                                                            <span>{{ count($order->OrderDetail) }} sản phẩm</span>
                                                        </div>
                                                        <div class="info-row">
                                                            <span>Tổng tiền</span>
                                                            <span class="price">{{ $order->total_price }} vnđ</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="order-footer">
                                                    <button type="button" class="btn-track" data-bs-toggle="collapse"
                                                        data-bs-target="#tracking1" aria-expanded="false">Theo dõi đơn
                                                        hàng</button>
                                                    <button type="button" class="btn-details" data-bs-toggle="collapse"
                                                        data-bs-target="#details1" aria-expanded="false">Chi tiết đơn
                                                        hàng</button>
                                                </div>

                                                <!-- Order Tracking -->
                                                <div class="collapse tracking-info" id="tracking1">
                                                    <div class="tracking-timeline">
                                                        <div class="timeline-item completed">
                                                            <div class="timeline-icon">
                                                                <i class="bi bi-check-circle-fill"></i>
                                                            </div>
                                                            <div class="timeline-content">
                                                                <h5>Order Confirmed</h5>
                                                                <p>Your order has been received and confirmed</p>
                                                                <span class="timeline-date">Feb 20, 2025 - 10:30 AM</span>
                                                            </div>
                                                        </div>

                                                        <div class="timeline-item completed">
                                                            <div class="timeline-icon">
                                                                <i class="bi bi-check-circle-fill"></i>
                                                            </div>
                                                            <div class="timeline-content">
                                                                <h5>Processing</h5>
                                                                <p>Your order is being prepared for shipment</p>
                                                                <span class="timeline-date">Feb 20, 2025 - 2:45 PM</span>
                                                            </div>
                                                        </div>

                                                        <div class="timeline-item active">
                                                            <div class="timeline-icon">
                                                                <i class="bi bi-box-seam"></i>
                                                            </div>
                                                            <div class="timeline-content">
                                                                <h5>Packaging</h5>
                                                                <p>Your items are being packaged for shipping</p>
                                                                <span class="timeline-date">Feb 20, 2025 - 4:15 PM</span>
                                                            </div>
                                                        </div>

                                                        <div class="timeline-item">
                                                            <div class="timeline-icon">
                                                                <i class="bi bi-truck"></i>
                                                            </div>
                                                            <div class="timeline-content">
                                                                <h5>In Transit</h5>
                                                                <p>Expected to ship within 24 hours</p>
                                                            </div>
                                                        </div>

                                                        <div class="timeline-item">
                                                            <div class="timeline-icon">
                                                                <i class="bi bi-house-door"></i>
                                                            </div>
                                                            <div class="timeline-content">
                                                                <h5>Delivery</h5>
                                                                <p>Estimated delivery: Feb 22, 2025</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Order Details -->
                                                <div class="collapse order-details" id="details1">
                                                    <div class="details-content">
                                                        <div class="detail-section">
                                                            <h5>Thông tin đơn hàng</h5>
                                                            <div class="info-grid">
                                                                <div class="info-item">
                                                                    <span class="label">Phương thức thanh toán</span>
                                                                    <span class="value">
                                                                        @if ($order->type_payment=='transfer')
                                                                            thanh toán online
                                                                        @else
                                                                            thanh toán khi nhận hàng
                                                                        @endif
                                                                        
                                                                    </span>
                                                                </div>
                                                                <div class="info-item">
                                                                    <span class="label">Giao hàng</span>
                                                                    <span class="value">2-3 ngày</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="detail-section">
                                                            <h5>Sản phẩm {{ count($order->OrderDetail) }}</h5>
                                                            <div class="order-items">

                                                                @foreach ($order->OrderDetail as $item)
                                                                    <div class="item">
                                                                        @foreach ($item->variant->product->images as $image)
                                                                            @if ($image->is_featured == 1)
                                                                                <img src="{{ asset('storage/' . $image->path) }}"
                                                                                    alt="Product" loading="lazy">
                                                                            @endif
                                                                        @endforeach
                                                                        <div class="item-info">
                                                                            <h6>{{ $item->variant->product->name }}</h6>
                                                                            <div class="item-meta">
                                                                                <span class="sku">Thuộc tính : {{$item->variant->attributesValue[0]->value }}</span>
                                                                                <span class="qty">Số lượng: {{$item->quantity}}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="item-price">{{$item->total_price}} vnđ</div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>

                                                        <div class="detail-section">
                                                            <h5>Price Details</h5>
                                                            <div class="price-breakdown">
                                                                <div class="price-row">
                                                                    <span>Subtotal</span>
                                                                    <span>$1,929.93</span>
                                                                </div>
                                                                <div class="price-row">
                                                                    <span>Shipping</span>
                                                                    <span>$15.99</span>
                                                                </div>
                                                                <div class="price-row">
                                                                    <span>Tax</span>
                                                                    <span>$159.98</span>
                                                                </div>
                                                                <div class="price-row total">
                                                                    <span>Total</span>
                                                                    <span>$2,105.90</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="detail-section">
                                                            <h5>Shipping Address</h5>
                                                            <div class="address-info">
                                                                <p>Sarah Anderson<br>123 Main Street<br>Apt 4B<br>New York,
                                                                    NY
                                                                    10001<br>United States</p>
                                                                <p class="contact">+1 (555) 123-4567</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    <!-- Pagination -->
                                    <div class="pagination-wrapper aos-init aos-animate" data-aos="fade-up">
                                        <button type="button" class="btn-prev" disabled="">
                                            <i class="bi bi-chevron-left"></i>
                                        </button>
                                        <div class="page-numbers">
                                            <button type="button" class="active">1</button>
                                            <button type="button">2</button>
                                            <button type="button">3</button>
                                            <span>...</span>
                                            <button type="button">12</button>
                                        </div>
                                        <button type="button" class="btn-next">
                                            <i class="bi bi-chevron-right"></i>
                                        </button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /Account Section -->

    </main>
@endsection
@push('scripts')
    <script>
        // JavaScript to toggle payment details based on payment method selection
        document.querySelectorAll('input[name="payment_method"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                document.querySelectorAll('.payment-details').forEach(function(details) {
                    details.style.display = 'none';
                });
                document.querySelectorAll('.payment-option').forEach(function(option) {
                    option.classList.remove('active');
                });
                const detailsId = this.id + '-details';
                document.getElementById(detailsId).style.display = 'block';
                this.closest('.payment-option').classList.add('active');

                // Update required attributes based on payment method
                const creditCardFields = ['card_number', 'expiry', 'cvv', 'card_name'];
                creditCardFields.forEach(function(field) {
                    const input = document.getElementById(field);
                    if (input) {
                        input.required = (radio.value === 'credit_card');
                    }
                });
            });
        });

        // Initialize tooltips
        document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function(element) {
            new bootstrap.Tooltip(element);
        });
    </script>
@endpush --}}

@extends('layouts.app')

@section('title', 'Account - eStore')

@section('body-class', 'account-page')

@section('content')
    <main class="main">
        <!-- Page Title -->
        <div class="page-title light-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Account</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li class="current">Account</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Account Section -->
        <section id="account" class="account section">

            <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">

                <!-- Mobile Menu Toggle -->
                <div class="mobile-menu d-lg-none mb-4">
                    <button class="mobile-menu-toggle" type="button" data-bs-toggle="collapse"
                        data-bs-target="#profileMenu">
                        <i class="bi bi-grid"></i>
                        <span>Menu</span>
                    </button>
                </div>

                <div class="row g-4">
                    <!-- Profile Menu -->
                    <div class="col-lg-3">
                        <div class="profile-menu collapse d-lg-block" id="profileMenu">
                            <!-- User Info -->
                            <div class="user-info aos-init aos-animate" data-aos="fade-right">
                                <div class="user-avatar">

                                    <img src="" alt="Profile" loading="lazy">
                                    <span class="status-badge"><i class="bi bi-shield-check"></i></span>
                                </div>
                                <h4>Sarah Anderson</h4>
                                <div class="user-status">
                                    <i class="bi bi-award"></i>
                                    <span>Premium Member</span>
                                </div>
                            </div>

                            <!-- Navigation Menu -->
                            <nav class="menu-nav">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#orders" aria-selected="true"
                                            role="tab" tabindex="-1">
                                            <i class="bi bi-box-seam"></i>
                                            <span>Đơn hàng của tôi</span>
                                            <span class="badge"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#settings"
                                            aria-selected="false" role="tab">
                                            <i class="bi bi-person"></i>
                                            <span>Tài khoản của tôi</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#reviews" aria-selected="false"
                                            role="tab" tabindex="-1">
                                            <i class="bi bi-star"></i>
                                            <span>Đánh giá của tôi</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#wishlist" aria-selected="false"
                                            role="tab" tabindex="-1">
                                            <i class="bi bi-eye"></i>
                                            <span>Sản phẩm đã xem</span>
                                            <span class="badge">12</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="menu-footer">
                                    <a href="#" class="logout-link">
                                        <i class="bi bi-box-arrow-right"></i>
                                        <span>Log Out</span>
                                    </a>
                                </div>
                            </nav>
                        </div>
                    </div>

                    <!-- Content Area -->
                    <div class="col-lg-9">
                        <div class="content-area">
                            <div class="tab-content">
                                <!-- Orders Tab -->
                                <div class="tab-pane fade active show" id="orders" role="tabpanel">
                                    <div class="section-header aos-init aos-animate" data-aos="fade-up">
                                        <h2>My Orders</h2>
                                        <div class="header-actions">
                                            <div class="search-box">
                                                <i class="bi bi-search"></i>
                                                <input type="text" placeholder="Search orders...">
                                            </div>
                                            <div class="dropdown">
                                                <button class="filter-btn" data-bs-toggle="dropdown">
                                                    <i class="bi bi-funnel"></i>
                                                    <span>Filter</span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">All Orders</a></li>
                                                    <li><a class="dropdown-item" href="#">Processing</a></li>
                                                    <li><a class="dropdown-item" href="#">Shipped</a></li>
                                                    <li><a class="dropdown-item" href="#">Delivered</a></li>
                                                    <li><a class="dropdown-item" href="#">Cancelled</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="orders-grid">
                                        <!-- Order Card 1 -->
                                        @foreach ($orders as $index=>$order)
                                            <div class="order-card aos-init aos-animate" data-aos="fade-up"
                                                data-aos-delay="100">
                                                <div class="order-header">
                                                    <div class="order-id">
                                                        <span class="label">Mã đơn hàng:{{ $order->id }}</span>
                                                    </div>
                                                    <div class="order-date">{{ $order->created_at }}</div>
                                                </div>
                                                <div class="order-content">
                                                    <div class="order-info">
                                                        <div class="info-row">
                                                            <span>Trạng thái</span>
                                                            <span class="status processing">{{$order->status_order}}</span>
                                                        </div>
                                                        <div class="info-row">
                                                            <span>Sản phẩm</span>
                                                            <span>{{ count($order->OrderDetail) }} sản phẩm</span>
                                                        </div>
                                                        <div class="info-row">
                                                            <span>Tổng tiền</span>
                                                            <span class="price">{{ $order->total_price }} vnđ</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="order-footer">
                                                    <button type="button" class="btn-track" data-bs-toggle="collapse"
                                                        data-bs-target="#tracking{{$index}}" aria-expanded="false">Theo dõi đơn
                                                        hàng</button>
                                                    <button type="button" class="btn-details" data-bs-toggle="collapse"
                                                        data-bs-target="#details{{$index}}" aria-expanded="false">Chi tiết đơn
                                                        hàng</button>
                                                </div>

                                                <!-- Order Tracking -->
                                                <div class="collapse tracking-info" id="tracking{{$index}}">
                                                    <div class="tracking-timeline">
                                                        <div class="timeline-item completed">
                                                            <div class="timeline-icon">
                                                                <i class="bi bi-check-circle-fill"></i>
                                                            </div>
                                                            <div class="timeline-content">
                                                                <h5>Order Confirmed</h5>
                                                                <p>Your order has been received and confirmed</p>
                                                                <span class="timeline-date">Feb 20, 2025 - 10:30 AM</span>
                                                            </div>
                                                        </div>

                                                        <div class="timeline-item completed">
                                                            <div class="timeline-icon">
                                                                <i class="bi bi-check-circle-fill"></i>
                                                            </div>
                                                            <div class="timeline-content">
                                                                <h5>Processing</h5>
                                                                <p>Your order is being prepared for shipment</p>
                                                                <span class="timeline-date">Feb 20, 2025 - 2:45 PM</span>
                                                            </div>
                                                        </div>

                                                        <div class="timeline-item active">
                                                            <div class="timeline-icon">
                                                                <i class="bi bi-box-seam"></i>
                                                            </div>
                                                            <div class="timeline-content">
                                                                <h5>Packaging</h5>
                                                                <p>Your items are being packaged for shipping</p>
                                                                <span class="timeline-date">Feb 20, 2025 - 4:15 PM</span>
                                                            </div>
                                                        </div>

                                                        <div class="timeline-item">
                                                            <div class="timeline-icon">
                                                                <i class="bi bi-truck"></i>
                                                            </div>
                                                            <div class="timeline-content">
                                                                <h5>In Transit</h5>
                                                                <p>Expected to ship within 24 hours</p>
                                                            </div>
                                                        </div>

                                                        <div class="timeline-item">
                                                            <div class="timeline-icon">
                                                                <i class="bi bi-house-door"></i>
                                                            </div>
                                                            <div class="timeline-content">
                                                                <h5>Delivery</h5>
                                                                <p>Estimated delivery: Feb 22, 2025</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Order Details -->
                                                <div class="collapse order-details" id="details{{$index}}">
                                                    <div class="details-content">
                                                        <div class="detail-section">
                                                            <h5>Thông tin đơn hàng</h5>
                                                            <div class="info-grid">
                                                                <div class="info-item">
                                                                    <span class="label">Phương thức thanh toán</span>
                                                                    <span class="value">
                                                                        @if ($order->type_payment=='transfer')
                                                                            thanh toán online
                                                                        @else
                                                                            thanh toán khi nhận hàng
                                                                        @endif
                                                                        
                                                                    </span>
                                                                </div>
                                                                <div class="info-item">
                                                                    <span class="label">Giao hàng</span>
                                                                    <span class="value">2-3 ngày</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="detail-section">
                                                            <h5>Sản phẩm {{ count($order->OrderDetail) }}</h5>
                                                            <div class="order-items">

                                                                @foreach ($order->OrderDetail as $item)
                                                                    <div class="item">
                                                                        @foreach ($item->variant->product->images as $image)
                                                                            @if ($image->is_featured == 1)
                                                                                <img src="{{ asset('storage/' . $image->path) }}"
                                                                                    alt="Product" loading="lazy">
                                                                            @endif
                                                                        @endforeach
                                                                        <div class="item-info">
                                                                            <h6>{{ $item->variant->product->name }}</h6>
                                                                            <div class="item-meta">
                                                                                <span class="sku">Thuộc tính : {{$item->variant->attributesValue[0]->value }}</span>
                                                                                <span class="qty">Số lượng: {{$item->quantity}}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="item-price">{{$item->total_price}} vnđ</div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>

                                                        <div class="detail-section">
                                                            <h5>Chi tiết giá</h5>
                                                            <div class="price-breakdown">
                                                                @php
                                                                    $subtotal = 0;
                                                                    foreach ($order->OrderDetail as $item) {
                                                                        $subtotal+=$item->total_price;
                                                                    }
                                                                @endphp
                                                                <div class="price-row">
                                                                    <span>Tổng sản phẩm</span>
                                                                    <span>{{ $subtotal }} vnđ</span>
                                                                </div>
                                                                <div class="price-row">
                                                                    <span>Vận chuyển</span>
                                                                    <span>30.000 vnđ</span>
                                                                </div>
                                                                <div class="price-row total">
                                                                    <span>Tổng tiền</span>
                                                                    <span>{{$subtotal + 30000}}</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="detail-section">
                                                            <h5>Thông tin giao hàng</h5>
                                                            <div class="address-info">
                                                                <p>{{$order->user_email}}<br>{{$order->user_address}}<br>
                                                                <p class="contact">{{$order->user_phone}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <!-- Order Card 4 -->
                                        {{-- <div class="order-card aos-init aos-animate" data-aos="fade-up"
                                            data-aos-delay="400">
                                            <div class="order-header">
                                                <div class="order-id">
                                                    <span class="label">Order ID:</span>
                                                    <span class="value">#ORD-2024-1245</span>
                                                </div>
                                                <div class="order-date">Feb 5, 2025</div>
                                            </div>
                                            <div class="order-content">
                                                <div class="product-grid">
                                                    <img src="assets/img/product/product-7.webp" alt="Product"
                                                        loading="lazy">
                                                    <img src="assets/img/product/product-8.webp" alt="Product"
                                                        loading="lazy">
                                                    <img src="assets/img/product/product-9.webp" alt="Product"
                                                        loading="lazy">
                                                    <span class="more-items">+2</span>
                                                </div>
                                                <div class="order-info">
                                                    <div class="info-row">
                                                        <span>Status</span>
                                                        <span class="status cancelled">Cancelled</span>
                                                    </div>
                                                    <div class="info-row">
                                                        <span>Items</span>
                                                        <span>5 items</span>
                                                    </div>
                                                    <div class="info-row">
                                                        <span>Total</span>
                                                        <span class="price">$1,299.99</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="order-footer">
                                                <button type="button" class="btn-reorder">Reorder</button>
                                                <button type="button" class="btn-details">View Details</button>
                                            </div>
                                        </div> --}}
                                    </div>

                                    <!-- Pagination -->
                                    <div class="pagination-wrapper aos-init aos-animate" data-aos="fade-up">
                                        <button type="button" class="btn-prev" disabled="">
                                            <i class="bi bi-chevron-left"></i>
                                        </button>
                                        <div class="page-numbers">
                                            <button type="button" class="active">1</button>
                                            <button type="button">2</button>
                                            <button type="button">3</button>
                                            <span>...</span>
                                            <button type="button">12</button>
                                        </div>
                                        <button type="button" class="btn-next">
                                            <i class="bi bi-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- Wishlist Tab -->
                                <div class="tab-pane fade" id="wishlist" role="tabpanel">
                                    <div class="section-header aos-init aos-animate" data-aos="fade-up">
                                        <h2>My Wishlist</h2>
                                        <div class="header-actions">
                                            <button type="button" class="btn-add-all">Add All to Cart</button>
                                        </div>
                                    </div>

                                    <div class="wishlist-grid">
                                        <!-- Wishlist Item 1 -->
                                        <div class="wishlist-card aos-init aos-animate" data-aos="fade-up"
                                            data-aos-delay="100">
                                            <div class="wishlist-image">
                                                <img src="assets/img/product/product-1.webp" alt="Product"
                                                    loading="lazy">
                                                <button class="btn-remove" type="button"
                                                    aria-label="Remove from wishlist">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                <div class="sale-badge">-20%</div>
                                            </div>
                                            <div class="wishlist-content">
                                                <h4>Lorem ipsum dolor sit amet</h4>
                                                <div class="product-meta">
                                                    <div class="rating">
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-half"></i>
                                                        <span>(4.5)</span>
                                                    </div>
                                                    <div class="price">
                                                        <span class="current">$79.99</span>
                                                        <span class="original">$99.99</span>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn-add-cart">Add to Cart</button>
                                            </div>
                                        </div>

                                        <!-- Wishlist Item 2 -->
                                        <div class="wishlist-card aos-init aos-animate" data-aos="fade-up"
                                            data-aos-delay="200">
                                            <div class="wishlist-image">
                                                <img src="assets/img/product/product-2.webp" alt="Product"
                                                    loading="lazy">
                                                <button class="btn-remove" type="button"
                                                    aria-label="Remove from wishlist">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                            <div class="wishlist-content">
                                                <h4>Consectetur adipiscing elit</h4>
                                                <div class="product-meta">
                                                    <div class="rating">
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star"></i>
                                                        <span>(4.0)</span>
                                                    </div>
                                                    <div class="price">
                                                        <span class="current">$149.99</span>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn-add-cart">Add to Cart</button>
                                            </div>
                                        </div>

                                        <!-- Wishlist Item 3 -->
                                        <div class="wishlist-card aos-init aos-animate" data-aos="fade-up"
                                            data-aos-delay="300">
                                            <div class="wishlist-image">
                                                <img src="assets/img/product/product-3.webp" alt="Product"
                                                    loading="lazy">
                                                <button class="btn-remove" type="button"
                                                    aria-label="Remove from wishlist">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                <div class="out-of-stock-badge">Out of Stock</div>
                                            </div>
                                            <div class="wishlist-content">
                                                <h4>Sed do eiusmod tempor</h4>
                                                <div class="product-meta">
                                                    <div class="rating">
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <span>(5.0)</span>
                                                    </div>
                                                    <div class="price">
                                                        <span class="current">$199.99</span>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn-notify">Notify When Available</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Reviews Tab -->
                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                    <div class="section-header aos-init aos-animate" data-aos="fade-up">
                                        <h2>My Reviews</h2>
                                        <div class="header-actions">
                                            <div class="dropdown">
                                                <button class="filter-btn" data-bs-toggle="dropdown">
                                                    <i class="bi bi-funnel"></i>
                                                    <span>Sort by: Recent</span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">Recent</a></li>
                                                    <li><a class="dropdown-item" href="#">Highest Rating</a></li>
                                                    <li><a class="dropdown-item" href="#">Lowest Rating</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="reviews-grid">
                                        <!-- Review Card 1 -->
                                        <div class="review-card aos-init aos-animate" data-aos="fade-up"
                                            data-aos-delay="100">
                                            <div class="review-header">
                                                <img src="assets/img/product/product-1.webp" alt="Product"
                                                    class="product-image" loading="lazy">
                                                <div class="review-meta">
                                                    <h4>Lorem ipsum dolor sit amet</h4>
                                                    <div class="rating">
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <span>(5.0)</span>
                                                    </div>
                                                    <div class="review-date">Reviewed on Feb 15, 2025</div>
                                                </div>
                                            </div>
                                            <div class="review-content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod
                                                    tempor incididunt ut labore et dolore magna aliqua.</p>
                                            </div>
                                            <div class="review-footer">
                                                <button type="button" class="btn-edit">Edit Review</button>
                                                <button type="button" class="btn-delete">Delete</button>
                                            </div>
                                        </div>

                                        <!-- Review Card 2 -->
                                        <div class="review-card aos-init aos-animate" data-aos="fade-up"
                                            data-aos-delay="200">
                                            <div class="review-header">
                                                <img src="assets/img/product/product-2.webp" alt="Product"
                                                    class="product-image" loading="lazy">
                                                <div class="review-meta">
                                                    <h4>Consectetur adipiscing elit</h4>
                                                    <div class="rating">
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star-fill"></i>
                                                        <i class="bi bi-star"></i>
                                                        <span>(4.0)</span>
                                                    </div>
                                                    <div class="review-date">Reviewed on Feb 10, 2025</div>
                                                </div>
                                            </div>
                                            <div class="review-content">
                                                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                                    ut aliquip ex ea commodo consequat.</p>
                                            </div>
                                            <div class="review-footer">
                                                <button type="button" class="btn-edit">Edit Review</button>
                                                <button type="button" class="btn-delete">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Settings Tab -->
                                <div class="tab-pane fade" id="settings" role="tabpanel">
                                    <div class="section-header aos-init aos-animate" data-aos="fade-up">
                                        <h2>Account Settings</h2>
                                    </div>

                                    <div class="settings-content">
                                        <!-- Personal Information -->
                                        <div class="settings-section aos-init aos-animate" data-aos="fade-up">
                                            <h3>Personal Information</h3>
                                            <form class="php-email-form settings-form">
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <label for="firstName" class="form-label">First Name</label>
                                                        <input type="text" class="form-control" id="firstName"
                                                            value="" required="">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="lastName" class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" id="lastName"
                                                            value="" required="">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="email"
                                                            value="" required="">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="phone" class="form-label">Phone</label>
                                                        <input type="tel" class="form-control" id="phone"
                                                            value="">
                                                    </div>
                                                </div>

                                                <div class="form-buttons">
                                                    <button type="submit" class="btn-save">Save Changes</button>
                                                </div>

                                                <div class="loading">Loading</div>
                                                <div class="text-red-700"></div>
                                                <div class="sent-message">Your changes have been saved successfully!</div>
                                            </form>
                                        </div>

                                        <!-- Email Preferences -->
                                        <div class="settings-section aos-init aos-animate" data-aos="fade-up"
                                            data-aos-delay="100">
                                            <h3>Email Preferences</h3>
                                            <div class="preferences-list">
                                                <div class="preference-item">
                                                    <div class="preference-info">
                                                        <h4>Order Updates</h4>
                                                        <p>Receive notifications about your order status</p>
                                                    </div>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="orderUpdates"
                                                            checked="">
                                                    </div>
                                                </div>

                                                <div class="preference-item">
                                                    <div class="preference-info">
                                                        <h4>Promotions</h4>
                                                        <p>Receive emails about new promotions and deals</p>
                                                    </div>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="promotions">
                                                    </div>
                                                </div>

                                                <div class="preference-item">
                                                    <div class="preference-info">
                                                        <h4>Newsletter</h4>
                                                        <p>Subscribe to our weekly newsletter</p>
                                                    </div>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="newsletter"
                                                            checked="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Security Settings -->
                                        <div class="settings-section aos-init aos-animate" data-aos="fade-up"
                                            data-aos-delay="200">
                                            <h3>Security</h3>
                                            <form class=" settings-form" method="post"
                                                action="{{ route('update_pass') }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="row g-3">
                                                    <div class="col-md-12">
                                                        <label for="current_password" class="form-label">Current
                                                            Password</label>
                                                        <input type="password" name="current_password"
                                                            class="form-control" id="currentPassword">
                                                        @error('current_password')
                                                            <div class="text-red-700">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="newPassword" class="form-label">New Password</label>
                                                        <input type="password" name="password" class="form-control"
                                                            id="newPassword">
                                                        @error('password')
                                                            <div class="text-red-700">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="confirmPassword" class="form-label">Confirm
                                                            Password</label>
                                                        <input type="password" class="form-control"
                                                            name="password_confirmation" id="confirmPassword">
                                                        @error('password_confirmation')
                                                            <div class="text-red-700">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-buttons">
                                                    <button type="submit" class="btn-save">Update Password</button>
                                                </div>
                                                <div class="text-red-700"></div>
                                                @if (session('success'))
                                                    <div class="text-green-700">
                                                        {{ session('success') }}
                                                    </div>
                                                @endif
                                            </form>
                                        </div>

                                        <!-- Delete Account -->
                                        <div class="settings-section danger-zone aos-init aos-animate" data-aos="fade-up"
                                            data-aos-delay="300">
                                            <h3>Delete Account</h3>
                                            <div class="danger-zone-content">
                                                <p>Once you delete your account, there is no going back. Please be certain.
                                                </p>
                                                <button type="button" class="btn-danger">Delete Account</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section><!-- /Account Section -->

    </main>
@endsection
@push('scripts')
    <script>
        // JavaScript to toggle payment details based on payment method selection
        document.querySelectorAll('input[name="payment_method"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                document.querySelectorAll('.payment-details').forEach(function(details) {
                    details.style.display = 'none';
                });
                document.querySelectorAll('.payment-option').forEach(function(option) {
                    option.classList.remove('active');
                });
                const detailsId = this.id + '-details';
                document.getElementById(detailsId).style.display = 'block';
                this.closest('.payment-option').classList.add('active');

                // Update required attributes based on payment method
                const creditCardFields = ['card_number', 'expiry', 'cvv', 'card_name'];
                creditCardFields.forEach(function(field) {
                    const input = document.getElementById(field);
                    if (input) {
                        input.required = (radio.value === 'credit_card');
                    }
                });
            });
        });

        // Initialize tooltips
        document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function(element) {
            new bootstrap.Tooltip(element);
        });
    </script>
@endpush
