@extends('layouts.app')

@section('title', 'Product Detail - eStore')

@section('body-class', 'product-detail-page')

@section('content')

<main class="main">
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

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
                        
                            {{-- @if($product->variants->count())
                                <div class="product-variants mb-4">
                                    <h6 class="option-title">Biến thể sản phẩm:</h6>
                                    <ul class="list-unstyled">
                                        @foreach($product->variants as $variant)
                                            <li class="mb-2">
                                                <strong>Giá:</strong> {{ number_format($variant->price, 0) }}₫<br>
                                                <strong>Số lượng trong kho:</strong> {{ $variant->stock_quantity }}<br>
                                                <strong>Thuộc tính:</strong>
                                                @if($variant->attributesValue->count())
                                                    <ul class="mb-0">
                                                        @foreach($variant->attributesValue as $value)
                                                            <li>{{ $value->attribute->name }}: {{ $value->value }}</li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <em>Không có thuộc tính</em>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @else
                                <p class="text-muted">Sản phẩm này chưa có biến thể.</p>
                            @endif --}}

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

                        {{-- <div class="product-quantity mb-4">
                            <h6 class="option-title">Quantity:</h6>
                            <div class="quantity-selector">
                                <button class="quantity-btn decrease"><i class="bi bi-dash"></i></button>
                                <input type="number" class="quantity-input" value="1" min="1">
                                <button class="quantity-btn increase"><i class="bi bi-plus"></i></button>
                            </div>
                        </div> --}}

                            <div class="product-actions">
                                 <form id="add-to-cart-form" action="{{ route('cart.add') }}" method="POST" class="d-inline-flex flex-column gap-2">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="variant_id" class="form-label">Chọn biến thể:</label>
                                        <select name="variant_id" id="variant_id" class="form-select">
                                            @foreach($product->variants as $variant)
                                                <option value="{{ $variant->id }}"
                                                    data-price="{{ $variant->price }}"
                                                    data-stock="{{ $variant->stock_quantity }}">
                                                    {{ number_format($variant->price, 0) }}₫ -
                                                    @foreach($variant->attributesValue as $value)
                                                        {{ $value->attribute->name }}: {{ $value->value }}
                                                    @endforeach
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label>Giá:</label>
                                        <div id="variant-price">{{ number_format($product->variants->first()->price ?? 0, 0) }}₫</div>
                                    </div>

                                    <div class="mb-3">
                                        <label>Số lượng trong kho:</label>
                                        <div id="variant-stock">{{ $product->variants->first()->stock_quantity ?? 0 }}</div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="quantity">Số lượng:</label>
                                        <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1">
                                    </div>

                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-cart-plus"></i> Thêm vào giỏ hàng
                                    </button>
                                </form>



                        
                    </div>
                    <a href="{{ url('/products') }}" class="btn btn-outline-secondary ms-2">← Back to List</a>
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
<script>
document.addEventListener('DOMContentLoaded', function () {
    const variantSelect = document.getElementById('variant_id');
    const priceDisplay = document.getElementById('variant-price');
    const stockDisplay = document.getElementById('variant-stock');

    variantSelect.addEventListener('change', function () {
        const selectedOption = this.options[this.selectedIndex];
        const price = parseInt(selectedOption.dataset.price);
        const stock = parseInt(selectedOption.dataset.stock);

        priceDisplay.textContent = price.toLocaleString('vi-VN') + '₫';
        stockDisplay.textContent = stock;
    });
});
document.addEventListener('DOMContentLoaded', function () {
    const variantSelect = document.getElementById('variant_id');
    const priceDisplay = document.getElementById('variant-price');
    const stockDisplay = document.getElementById('variant-stock');
    const quantityInput = document.getElementById('quantity');
    const form = document.getElementById('add-to-cart-form');

    variantSelect.addEventListener('change', function () {
        const selectedOption = this.options[this.selectedIndex];
        const price = parseInt(selectedOption.dataset.price);
        const stock = parseInt(selectedOption.dataset.stock);

        priceDisplay.textContent = price.toLocaleString('vi-VN') + '₫';
        stockDisplay.textContent = stock;

        quantityInput.max = stock;
    });

    form.addEventListener('submit', function (e) {
        const selectedOption = variantSelect.options[variantSelect.selectedIndex];
        const stock = parseInt(selectedOption.dataset.stock);
        const quantity = parseInt(quantityInput.value);

        if (quantity > stock) {
            e.preventDefault();
            alert('Số lượng vượt quá tồn kho! Vui lòng chọn số lượng nhỏ hơn hoặc bằng ' + stock);
        }
    });
});

</script>
