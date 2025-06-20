@extends('layouts.app')

@section('title', 'Product Detail - eStore')

@section('body-class', 'product-detail-page')

@section('content')

<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Product Detail</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="current">{{ $product->name }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Product Details Section -->
    <section id="product-details" class="product-details section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <!-- Product Image -->
                <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right" data-aos-delay="200">
                    <div class="product-images">
                        <div class="main-image-container mb-3">
                            <div class="image-zoom-container">
                                <img src="{{ asset('assets/img/product/default.webp') }}" alt="{{ $product->name }}" class="img-fluid main-image drift-zoom">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                    <div class="product-info">
                        <div class="product-meta mb-2">
                            <span class="product-category">Category ID: {{ $product->category_id }}</span>
                        </div>

                        <h1 class="product-title">{{ $product->name }}</h1>

                        <div class="product-price-container mb-4">
                            <span class="current-price">{{ number_format($product->base_price, 0) }}₫</span>
                        </div>

                        <div class="product-short-description mb-4">
                            <p>{{ $product->description }}</p>
                        </div>

                        <div class="product-availability mb-4">
                            <i class="bi bi-check-circle-fill text-success"></i>
                            <span>In Stock</span>
                        </div>

                        <div class="product-quantity mb-4">
                            <h6 class="option-title">Quantity:</h6>
                            <div class="quantity-selector">
                                <button class="quantity-btn decrease"><i class="bi bi-dash"></i></button>
                                <input type="number" class="quantity-input" value="1" min="1">
                                <button class="quantity-btn increase"><i class="bi bi-plus"></i></button>
                            </div>
                        </div>

                        <div class="product-actions">
                            <button class="btn btn-primary add-to-cart-btn">
                                <i class="bi bi-cart-plus"></i> Add to Cart
                            </button>
                            <a href="{{ url('/products') }}" class="btn btn-outline-secondary">← Back to List</a>
                        </div>

                        <div class="additional-info mt-4">
                            <div class="info-item">
                                <i class="bi bi-truck"></i>
                                <span>Free shipping on orders over 500,000₫</span>
                            </div>
                            <div class="info-item">
                                <i class="bi bi-arrow-repeat"></i>
                                <span>7-day return policy</span>
                            </div>
                            <div class="info-item">
                                <i class="bi bi-shield-check"></i>
                                <span>Genuine warranty</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
