<header id="header" class="header position-relative">
    <!-- Top Bar -->
    <div class="top-bar py-2">
        <div class="container-fluid container-xl">
            <div class="row align-items-center">
                <div class="col-lg-4 d-none d-lg-flex">
                    <div class="top-bar-item">
                        <i class="bi bi-telephone-fill me-2"></i>
                        <span>Bạn cần trợ giúp ? Liên hệ : </span>
                        <a href="tel:+338134988"> 0338-134-988</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 text-center">
                    <div class="announcement-slider swiper init-swiper">
                        <script type="application/json" class="swiper-config">
                            {
                                "loop": true,
                                "speed": 600,
                                "autoplay": {
                                    "delay": 5000
                                },
                                "slidesPerView": 1,
                                "direction": "vertical",
                                "effect": "slide"
                            }
                        </script>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">🚚 Miễn phí giao hàng cho đơn từ 500.000 vnđ</div>
                            <div class="swiper-slide">💰 Hỗ trợ hoàn tiền trong 30 ngày</div>
                            <div class="swiper-slide">🎁 Giảm 20% cho đơn hàng đầu tiên</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 d-none d-lg-block">
                    <div class="d-flex justify-content-end">
                        <div class="top-bar-item dropdown me-3">
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="bi bi-translate me-2"></i>VN
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i
                                            class="bi bi-check2 me-2 selected-icon"></i>Vietnamese</a></li>
                            </ul>
                        </div>
                        <div class="top-bar-item dropdown">
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="bi bi-currency-dollar me-2"></i>VNĐ
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i
                                            class="bi bi-check2 me-2 selected-icon"></i>VNĐ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <div class="main-header">
        <div class="container-fluid container-xl">
            <div class="d-flex py-3 align-items-center justify-content-between">
                <!-- Logo -->
                <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                    <h1 class="sitename">ViStar</h1>
                </a>

                <!-- Search -->
                <form class="search-form desktop-search-form">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm...">
                        <button class="btn" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>

                <!-- Actions -->
                <div class="header-actions d-flex align-items-center justify-content-end">
                    <!-- Mobile Search Toggle -->
                    <button class="header-action-btn mobile-search-toggle d-xl-none" type="button"
                        data-bs-toggle="collapse" data-bs-target="#mobileSearch" aria-expanded="false"
                        aria-controls="mobileSearch">
                        <i class="bi bi-search"></i>
                    </button>

                    <!-- Account -->
                    <div class="dropdown account-dropdown">
                        <button class="header-action-btn" data-bs-toggle="dropdown">
                            <i class="bi bi-person"></i>
                        </button>
                        <div class="dropdown-menu">
                            <div class="dropdown-header">
                                <h6>ViStar <span class="sitename">xin chào</span></h6>
                                <p class="mb-0">CHÀO MỪNG QUÝ KHÁCH ĐẾN VỚI VISTAR</p>
                            </div>
                            <div class="dropdown-body">
                                @if (isset(session('user')->id) && session('user')->id > 0)
                                    <a class="dropdown-item d-flex align-items-center" href="{{ url('account') }}">
                                        <i class="bi bi-person-circle me-2"></i>
                                        <span>Tài khoản</span>
                                    </a>
                                @endif 
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('orders.index') }}">
                                    <i class="bi bi-bag-check me-2"></i>
                                    <span>Đơn hàng</span>
                                </a>
                            </div>
                            @if (isset(session('user')->id) && session('user')->id > 0)
                                <div class="dropdown-footer">
                                    <form method="POST" action="{{ route('auth.destroy') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-secondary w-100">Đăng xuất </button>
                                    </form>
                                </div>
                            @else
                                <div class="dropdown-footer">
                                    <a class="btn btn-primary w-100" href="{{ url('login') }}">Đăng nhập</a>
                                    <a class="btn btn-secondary w-100 mt-2" href="{{ url('register') }}">Đăng ký</a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Wishlist -->
                    <a href="{{ route('orders.index') }}" class="header-action-btn d-none d-md-block">
                        <i class="bi bi-bag-check me-2"></i>
                        <span class="badge">0</span>
                    </a>

                    <!-- Cart -->
                    <a href="{{ url('cart') }}" class="header-action-btn">
                        <i class="bi bi-cart3"></i>
                        <span class="badge">3</span>
                    </a>

                    <!-- Mobile Navigation Toggle -->
                    <i class="mobile-nav-toggle d-xl-none bi bi-list me-0"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <div class="header-nav">
        <div class="container-fluid container-xl">
            <div class="position-relative">
                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="{{ url('/') }}"
                                class="@if (Route::is('home')) active @endif">Trang chủ</a></li>
                        <li><a href="{{ url('about') }}">Giới thiệu</a></li>
                        <li><a href="{{ route('products.index','') }}">Sản phẩm</a></li>
                        <li><a href="{{ url('cart') }}">Giỏ hàng</a></li>
                        <li><a href="{{ url('contact') }}">Liên hệ</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Mobile Search Form -->
    <div class="collapse" id="mobileSearch">
        <div class="container">
            <form class="search-form">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm...">
                    <button class="btn" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</header>
