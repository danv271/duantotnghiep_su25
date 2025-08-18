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

                                    <img src="{{asset('storege/'.$data['avatar'])}}" alt="Profile" loading="lazy">
                                    <span class="status-badge"><i class="bi bi-shield-check"></i></span>
                                </div>
                                <h4>{{$data['name']}}</h4>
                                <div class="user-status">
                                    <i class="bi bi-award"></i>
                                    <span>Premium Member</span>
                                </div>
                            </div>

                            <!-- Navigation Menu -->
                            <nav class="menu-nav">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#orders" aria-selected="false"
                                            role="tab" tabindex="-1">
                                            <i class="bi bi-box-seam"></i>
                                            <span>Đơn hàng của tôi </span>
                                            <span class="badge">{{ count($orders) }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#wishlist" aria-selected="false"
                                            role="tab" tabindex="-1">
                                            <i class="bi bi-heart"></i>
                                            <span>Wishlist</span>
                                            <span class="badge">12</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#wallet" aria-selected="false"
                                            role="tab" tabindex="-1">
                                            <i class="bi bi-wallet2"></i>
                                            <span>Payment Methods</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#reviews" aria-selected="false"
                                            role="tab" tabindex="-1">
                                            <i class="bi bi-star"></i>
                                            <span>My Reviews</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#addresses" aria-selected="false"
                                            role="tab" tabindex="-1">
                                            <i class="bi bi-geo-alt"></i>
                                            <span>Địa chỉ </span>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#settings"
                                            aria-selected="true" role="tab">
                                            <i class="bi bi-gear"></i>
                                            <span>Cài đặt tài khoản </span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="menu-footer">
                                    <a href="#" class="help-link">
                                        <i class="bi bi-question-circle"></i>
                                        <span>Help Center</span>
                                    </a>
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
                                <div class="tab-pane fade" id="orders" role="tabpanel">
                                    <div class="section-header aos-init aos-animate" data-aos="fade-up">
                                        <h2>Đơn hàng của tôi </h2>
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
                                                            <span
                                                                class="status processing">
                                                                {{ $order->status_order }}
                                                            </span>
                                                        </div>
                                                        <div class="info-row">
                                                            <span>Sản phẩm</span>
                                                            <span>{{ count($order->OrderDetail) }} sản phẩm</span>
                                                        </div>
                                                        <div class="info-row">
                                                            <span>Tổng tiền</span>
                                                            <span
                                                                class="price">{{ number_format($order->total_price, 0, ',', '.') }}
                                                                vnđ</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="order-footer">
                                                    <button type="button" class="btn-track" data-bs-toggle="collapse"
                                                        data-bs-target="#tracking-{{ $order->id }}"
                                                        aria-expanded="false">Theo dõi đơn
                                                        hàng</button>
                                                    <button type="button" class="btn-details" data-bs-toggle="collapse"
                                                        data-bs-target="#details-{{ $order->id }}"
                                                        aria-expanded="false">Chi tiết đơn
                                                        hàng</button>
                                                </div>

                                                <!-- Order Tracking -->
                                                <div class="collapse tracking-info" id="tracking-{{ $order->id }}">
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
                                                <div class="collapse order-details" id="details-{{ $order->id }}">
                                                    <div class="details-content">
                                                        <div class="detail-section">
                                                            <h5>Thông tin đơn hàng</h5>
                                                            <div class="info-grid">
                                                                <div class="info-item">
                                                                    <span class="label">Phương thức thanh toán</span>
                                                                    <span class="value">
                                                                        @if ($order->type_payment == 'vnpay')
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
                                                                                <span class="sku">Thuộc tính :
                                                                                    {{ $item->variant->attributesValue[0]->value }}</span>
                                                                                <span class="qty">Số lượng:
                                                                                    {{ $item->quantity }}</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="item-price">
                                                                            {{ number_format($item->total_price) }}
                                                                            vnđ</div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>

                                                        <div class="detail-section">
                                                            <h5>Chi tiết giá </h5>
                                                            <div class="price-breakdown">
                                                                <div class="price-row">
                                                                    <span>Tổng tiền</span>
                                                                    <span>
                                                                        @php
                                                                            $total = 0;
                                                                            foreach ($order->OrderDetail as $item) {
                                                                                $total += $item->total_price;
                                                                            }
                                                                        @endphp
                                                                        {{ number_format($total, 0, ',', '.') }} VNĐ
                                                                    </span>
                                                                </div>
                                                                <div class="price-row">
                                                                    <span>Chi phí vận chuyển </span>
                                                                    <span>{{ number_format($order->shipping_cost, 0, ',', '.') }}
                                                                        vnđ</span>
                                                                </div>
                                                                <div class="price-row">
                                                                    <span>Thuế </span>
                                                                    <span>{{ ($total / 100) * 10 }}</span>
                                                                </div>
                                                                <div class="price-row total">
                                                                    <span>Tổng tiền </span>
                                                                    <span>{{ number_format($total + ($total / 100) * 10 + $order->shipping_cost, 0, ',', '.') }}
                                                                        VNĐ</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="detail-section">
                                                            <h5>Địa chỉ </h5>
                                                            <div class="address-info">
                                                                <p>{{ $order->user_address }}</p>
                                                                <p class="contact">{{ $order->user_phone }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <!-- Order Card 4 -->
                                        <div class="order-card aos-init aos-animate" data-aos="fade-up"
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
                                        </div>
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

                                <!-- Payment Methods Tab -->
                                <div class="tab-pane fade" id="wallet" role="tabpanel">
                                    <div class="section-header aos-init aos-animate" data-aos="fade-up">
                                        <h2>Payment Methods</h2>
                                        <div class="header-actions">
                                            <button type="button" class="btn-add-new">
                                                <i class="bi bi-plus-lg"></i>
                                                Add New Card
                                            </button>
                                        </div>
                                    </div>

                                    <div class="payment-cards-grid">
                                        <!-- Payment Card 1 -->
                                        <div class="payment-card default aos-init aos-animate" data-aos="fade-up"
                                            data-aos-delay="100">
                                            <div class="card-header">
                                                <i class="bi bi-credit-card"></i>
                                                <div class="card-badges">
                                                    <span class="default-badge">Default</span>
                                                    <span class="card-type">Visa</span>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="card-number">•••• •••• •••• 4589</div>
                                                <div class="card-info">
                                                    <span>Expires 09/2026</span>
                                                </div>
                                            </div>
                                            <div class="card-actions">
                                                <button type="button" class="btn-edit">
                                                    <i class="bi bi-pencil"></i>
                                                    Edit
                                                </button>
                                                <button type="button" class="btn-remove">
                                                    <i class="bi bi-trash"></i>
                                                    Remove
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Payment Card 2 -->
                                        <div class="payment-card aos-init aos-animate" data-aos="fade-up"
                                            data-aos-delay="200">
                                            <div class="card-header">
                                                <i class="bi bi-credit-card"></i>
                                                <div class="card-badges">
                                                    <span class="card-type">Mastercard</span>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="card-number">•••• •••• •••• 7821</div>
                                                <div class="card-info">
                                                    <span>Expires 05/2025</span>
                                                </div>
                                            </div>
                                            <div class="card-actions">
                                                <button type="button" class="btn-edit">
                                                    <i class="bi bi-pencil"></i>
                                                    Edit
                                                </button>
                                                <button type="button" class="btn-remove">
                                                    <i class="bi bi-trash"></i>
                                                    Remove
                                                </button>
                                                <button type="button" class="btn-make-default">Make Default</button>
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

                                <!-- Addresses Tab -->
                                <div class="tab-pane fade" id="addresses" role="tabpanel">
                                    <div class="section-header aos-init aos-animate" data-aos="fade-up">
                                        <h2>Địa chỉ của tôi </h2>
                                        <div class="header-actions">
                                            <button type="button" id="show_form_address" class="btn-add-new">
                                                <i class="bi bi-plus-lg"></i>
                                                Thêm mới địa chỉ
                                            </button>
                                        </div>
                                    </div>

                                    <div class="addresses-grid">
                                        <!-- Address Card 1 -->
                                        <div class="address-card default aos-init aos-animate" data-aos="fade-up"
                                            data-aos-delay="100">
                                            <div class="card-header">
                                                <span class="default-badge">Mặc định</span>
                                            </div>
                                            <div class="card-body">
                                                <p class="address-text">{{ $data->address }}</p>
                                                <div class="contact-info">
                                                    <div><i class="bi bi-person"></i>{{ $data->name }}</div>
                                                    <div><i class="bi bi-telephone"></i>{{ $data->phone }}</div>
                                                </div>
                                            </div>
                                            <div class="card-actions">
                                                <button type="button" class="btn-edit">
                                                    <i class="bi bi-pencil"></i>
                                                    Sửa
                                                </button>
                                                <button type="button" class="btn-remove">
                                                    <i class="bi bi-trash"></i>
                                                    Xóa
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Address Card 2 -->
                                        <div class="address-card aos-init aos-animate" data-aos="fade-up"
                                            data-aos-delay="200">
                                            <div class="card-header">
                                                <h4>Office</h4>
                                            </div>
                                            <div class="card-body">
                                                <p class="address-text">456 Business Ave<br>Suite 200<br>San Francisco, CA
                                                    94107<br>United States</p>
                                                <div class="contact-info">
                                                    <div><i class="bi bi-person"></i> Sarah Anderson</div>
                                                    <div><i class="bi bi-telephone"></i> +1 (555) 987-6543</div>
                                                </div>
                                            </div>
                                            <div class="card-actions">
                                                <button type="button" class="btn-edit">
                                                    <i class="bi bi-pencil"></i>
                                                    Edit
                                                </button>
                                                <button type="button" class="btn-remove">
                                                    <i class="bi bi-trash"></i>
                                                    Remove
                                                </button>
                                                <button type="button" class="btn-make-default">Make Default</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Settings Tab -->
                                <div class="tab-pane fade active show" id="settings" role="tabpanel">
                                    <div class="section-header aos-init aos-animate" data-aos="fade-up">
                                        <h2>Cài đặt tài khoản </h2>
                                    </div>

                                    <div class="settings-content">
                                        <!-- Personal Information -->
                                        <div class="settings-section aos-init aos-animate" data-aos="fade-up">
                                            <h3>Thông tin người dùng</h3>

                                            <!-- Hiển thị thông báo lỗi -->
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul class="mb-0">
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <!-- Hiển thị thông báo thành công -->
                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif
                                            <form class="settings-form" method="post"
                                                action="{{ route('update.user') }}">
                                                @csrf
                                                @method('PUT')

                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <label for="firstName" class="form-label">Họ</label>
                                                        <input type="text" name="firstName"
                                                            class="form-control @error('firstName') is-invalid @enderror"
                                                            id="firstName"
                                                            value="{{ old('firstName', $data->first_name ?? '') }}"
                                                            required>
                                                        @error('firstName')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="lastName" class="form-label">Tên</label>
                                                        <input type="text" name="lastName"
                                                            class="form-control @error('lastName') is-invalid @enderror"
                                                            id="lastName"
                                                            value="{{ old('lastName', $data->last_name ?? '') }}"
                                                            required>
                                                        @error('lastName')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" name="email"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            id="email" value="{{ old('email', $data->email ?? '') }}"
                                                            required>
                                                        @error('email')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="phone" class="form-label">Số điện thoại</label>
                                                        <input type="tel" name="phone"
                                                            class="form-control @error('phone') is-invalid @enderror"
                                                            value="{{ old('phone', $data->phone ?? '') }}">
                                                        @error('phone')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-buttons">
                                                    <button type="submit" class="btn-save">Lưu thay đổi</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- Email Preferences -->
                                        <div class="settings-section aos-init aos-animate" data-aos="fade-up"
                                            data-aos-delay="100">
                                            <h3>Tùy chọn email</h3>
                                            <div class="preferences-list">
                                                <div class="preference-item">
                                                    <div class="preference-info">
                                                        <h4>Cập nhật đơn hàng</h4>
                                                        <p>Nhận thông báo về trạng thái đơn hàng của bạn</p>
                                                    </div>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="orderUpdates"
                                                            checked="">
                                                    </div>
                                                </div>

                                                <div class="preference-item">
                                                    <div class="preference-info">
                                                        <h4>Khuyến mãi</h4>
                                                        <p>Nhận email về các chương trình khuyến mãi và ưu đãi mới</p>
                                                    </div>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="promotions">
                                                    </div>
                                                </div>

                                                <div class="preference-item">
                                                    <div class="preference-info">
                                                        <h4>Bản tin</h4>
                                                        <p>Đăng ký nhận bản tin hàng tuần của chúng tôi</p>
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
                                            <h3>Bảo Mật </h3>
                                            <form class=" settings-form" method="post"
                                                action="{{ route('update_pass') }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="row g-3">
                                                    <div class="col-md-12">
                                                        <label for="current_password" class="form-label">Mật khẩu hiện tại
                                                        </label>
                                                        <input type="password" name="current_password"
                                                            class="form-control" id="currentPassword">
                                                        @error('current_password')
                                                            <div class="text-red-700">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="newPassword" class="form-label">Mật khẩu mới </label>
                                                        <input type="password" name="password" class="form-control"
                                                            id="newPassword">
                                                        @error('password')
                                                            <div class="text-red-700">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="confirmPassword" class="form-label">Nhập lại mật khẩu
                                                        </label>
                                                        <input type="password" class="form-control"
                                                            name="password_confirmation" id="confirmPassword">
                                                        @error('password_confirmation')
                                                            <div class="text-red-700">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-buttons">
                                                    <button type="submit" class="btn-save">Cập nhật Mật khẩu </button>
                                                </div>
                                                <div class="text-red-700"></div>
                                                @if (session('success'))
                                                    <div class="text-green-700">
                                                        {{ session('success') }}
                                                    </div>
                                                @endif
                                            </form>
                                        </div>

                                        <!-- Xóa tài khoản -->
                                        <div class="settings-section danger-zone aos-init aos-animate" data-aos="fade-up"
                                            data-aos-delay="300">
                                            <h3>Xóa tài khoản</h3>
                                            <div class="danger-zone-content">
                                                <p>Một khi bạn đã xóa tài khoản, bạn sẽ không thể quay lại được nữa. Hãy
                                                    chắc chắn nhé.
                                                </p>
                                                <button type="button" class="btn-danger">Xóa tài khoản</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>

        <section style="display: none ;" id="form-address" class="login-register section">
            <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="login-register-wraper">
                            <div class="tab-content">

                                <!-- Registration Form -->
                                <div class="tab-pane fade show active" id="login-register-registration-form"
                                    role="tabpanel">
                                    <form>
                                        <div class="col-sm-12">
                                            <div class="mb-3">
                                                <label for="login-register-reg-lastname" class="form-label">Tên Người Nhận
                                                </label>
                                                <input type="text" class="form-control"
                                                    id="login-register-reg-lastname" required="">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="mb-3">
                                                <label for="login-register-reg-phone" class="form-label">Số điện
                                                    thoại</label>
                                                <input type="tel" class="form-control" id="login-register-reg-phone"
                                                    required="">
                                            </div>
                                        </div>
                                        <!-- Address Section -->
                                        <div class="col-12">
                                            <div class="address-section">
                                                <h6><i class="bi bi-geo-alt me-2"></i>Thông tin địa chỉ</h6>

                                                <div class="row g-3">
                                                    <div class="col-12">
                                                        <label for="login-register-reg-address" class="form-label">Địa chỉ
                                                            chi tiết</label>
                                                        <input type="text" class="form-control"
                                                            id="login-register-reg-address"
                                                            placeholder="Số nhà, tên đường..." required="">
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <label for="login-register-reg-province"
                                                            class="form-label">Tỉnh/Thành phố</label>
                                                        <select class="form-control" id="login-register-reg-province"
                                                            required="">
                                                            <option value="">Chọn tỉnh/thành</option>
                                                            <option value="hanoi">Hà Nội</option>
                                                            <option value="hcm">TP. Hồ Chí Minh</option>
                                                            <option value="danang">Đà Nẵng</option>
                                                            <option value="haiphong">Hải Phòng</option>
                                                            <option value="cantho">Cần Thơ</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <label for="login-register-reg-district"
                                                            class="form-label">Quận/Huyện</label>
                                                        <select class="form-control" id="login-register-reg-district"
                                                            required="">
                                                            <option value="">Chọn quận/huyện</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-4">
                                                        <label for="login-register-reg-ward"
                                                            class="form-label">Phường/Xã</label>
                                                        <select class="form-control" id="login-register-reg-ward"
                                                            required="">
                                                            <option value="">Chọn phường/xã</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12" style="margin-top: 30px">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary btn-lg">Thêm địa
                                                    chỉ</button>
                                            </div>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
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

        document.addEventListener('DOMContentLoaded', function() {
            const showFormAddress = document.getElementById('show_form_address');
            const formAddress = document.getElementById('form-address');
            const addressForm = formAddress.querySelector('form');

            // Hiển thị form khi nhấn nút "show_form_address"
            showFormAddress.addEventListener('click', function() {
                formAddress.style.display = 'flex';
            });

            // Ẩn form khi nhấn nút submit
            addressForm.addEventListener('submit', function(e) {
                e.preventDefault(); // Ngăn gửi form thực sự (chỉ để demo, xóa nếu cần gửi dữ liệu)
                formAddress.style.display = 'none';
            });

            // Ẩn form khi nhấp chuột ra ngoài
            document.addEventListener('click', function(e) {
                // Kiểm tra nếu nhấp chuột không nằm trong form và không phải nút "show_form_address"
                if (!formAddress.contains(e.target) && e.target !== showFormAddress) {
                    formAddress.style.display = 'none';
                }
            });
        });
    </script>
    <style>
        #form-address {
            display: none;
            /* Mặc định ẩn */
            position: fixed;
            /* Định vị cố định so với viewport */
            top: 0;
            left: 0;
            width: 100vw;
            /* Chiếm toàn bộ chiều rộng viewport */
            height: 100vh;
            /* Chiếm toàn bộ chiều cao viewport */
            background: rgba(0, 0, 0, 0.5);
            /* Nền mờ để làm nổi bật form */
            z-index: 1000;
            /* Đảm bảo form nằm trên các phần tử khác */
            display: flex;
            /* Sử dụng flex thay vì grid để đơn giản hơn */
            justify-content: center;
            /* Căn giữa ngang */
            align-items: center;
            /* Căn giữa dọc */
        }
    </style>
@endpush
