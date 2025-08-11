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
            <h1 class="mb-2 mb-lg-0">Chi tiết sản phẩm</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Trang chủ</a></li>
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
                <div class="col-lg-7 mb-5 mb-lg-0" data-aos="fade-right" data-aos-delay="200">
                    {{-- <div class="product-images">
                        <div class="main-image-container mb-3">
                            <div class="image-zoom-container">
                                @foreach ($product->images as $image)
                                    @if ($image->is_featured !== 1)
                                         <img src="{{ asset('storage/'.$image->path) }}" alt="{{ $product->name }}" class="img-fluid main-image drift-zoom">
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div> --}}
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-inner">
                            @foreach ($product->images  as $index => $image)
                                @if ($image->is_featured !== 1 && $index === 1)
                                    <div class="carousel-item active">
                                        <img src="{{asset('storage/'.$image->path)}}" class="d-block w-100" alt="...">
                                    </div>
                                @endif
                            @endforeach
                            @foreach ($product->images  as $index => $image)
                                @if ($image->is_featured !== 1 && $index !== 1)
                                    <div class="carousel-item">
                                        <img src="{{asset('storage/'.$image->path)}}" class="d-block w-100" alt="...">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        </div>
                </div>

                <!-- Product Info -->
                <div class="col-lg-5" data-aos="fade-left" data-aos-delay="200">
                    <div class="product-info">
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
                        <div class="row mb-1">
                            <div class="product-price-container col-4">
                                <span id="variant-price" class="current-price fw-bold">{{ number_format($product->base_price, 0,',','.') }}₫</span>
                            </div>
                            {{-- <div class="mb-3">
                                <label class="form-label">Giá:</label>
                                <div id="variant-price" class="fw-bold">—</div>
                            </div> --}}
                            <div class="product-availability col-6">
                                <i class="bi bi-check-circle-fill text-success"></i>
                                <span>Còn hàng</span>
                            </div>
                            <div class="col-2">
                                <input type="hidden" id="quantityProduct" value="{{$totalProduct}}">
                            </div>
                        </div>
                        {{-- <div class="product-quantity mb-4">
                            <h6 class="option-title">Quantity:</h6>
                            <div class="quantity-selector">
                                <button class="quantity-btn decrease"><i class="bi bi-dash"></i></button>
                                <input type="number" class="quantity-input" value="1" min="1">
                                <button class="quantity-btn increase"><i class="bi bi-plus"></i></button>
                            </div>
                        </div> --}}

                        <div class="product-actions row">
                                <form id="add-to-cart-form" action="{{ route('cart.add') }}" method="POST" class="d-inline-flex flex-column gap-2">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <label for="variant_id" class="form-label mb-3">Chọn thuộc tính:</label>
                                        <select name="variant_id" id="variant_id" class="form-select">
                                            <option value="">---chọn---</option>
                                            @foreach($product->variants as $variant)
                                                <option value="{{ $variant->id }}"
                                                    data-price="{{ $variant->price }}"
                                                    data-stock="{{ $variant->stock_quantity }}">
                                                    @foreach($variant->attributesValue as $value)
                                                        {{ $value->attribute->name }}: {{ $value->value }}
                                                    @endforeach
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label for="quantity" class="form-label mb-3">Số lượng:</label>
                                        <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p>còn lại : <span id="variant-stock" class="fw-bold">{{$totalProduct}}</span></p>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label">Giá:</label>
                                        <div id="variant-price" class="fw-bold">—</div>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="additional-info mt-1 ">
                                    <div class="info-item">
                                        <i class="bi bi-truck"></i>
                                        <span>Giao nhanh 30p trong nội thành</span>
                                    </div>
                                    <div class="info-item">
                                        <i class="bi bi-arrow-repeat"></i>
                                        <span>Chính sách bảo hành</span>
                                    </div>
                                    <div class="info-item">
                                        <i class="bi bi-shield-check"></i>
                                        <span>Khuyến mãi hấp dẫn</span>
                                    </div>
                                </div>
                                
                                <button id="btnSubmit" type="submit" class="btn btn-primary" {{$totalProduct==0 ? 'disabled':''}}>
                                    <i class="bi bi-cart-plus"></i> {{$totalProduct==0 ? 'Tạm hết hàng':'Thêm vào giỏ hàng'}}
                                </button>
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
<script>
// document.addEventListener('DOMContentLoaded', function () {
//     const variantSelect = document.getElementById('variant_id');
//     const priceDisplay = document.getElementById('variant-price');
//     const stockDisplay = document.getElementById('variant-stock');

//     variantSelect.addEventListener('change', function () {
//         const selectedOption = this.options[this.selectedIndex];
//         const price = parseInt(selectedOption.dataset.price);
//         const stock = parseInt(selectedOption.dataset.stock);

//         priceDisplay.textContent = price.toLocaleString('vi-VN') + '₫';
//         stockDisplay.textContent = stock;
//     });
// });
// document.addEventListener('DOMContentLoaded', function () {
//     const variantSelect = document.getElementById('variant_id');
//     const priceDisplay = document.getElementById('variant-price');
//     const stockDisplay = document.getElementById('variant-stock');
//     const quantityInput = document.getElementById('quantity');
//     const form = document.getElementById('add-to-cart-form');

//     variantSelect.addEventListener('change', function () {
//         const selectedOption = this.options[this.selectedIndex];
//         const price = parseInt(selectedOption.dataset.price);
//         const stock = parseInt(selectedOption.dataset.stock);

//         priceDisplay.textContent = price.toLocaleString('vi-VN') + '₫';
//         stockDisplay.textContent = stock;

//         quantityInput.max = stock;
//     });

//     form.addEventListener('submit', function (e) {
//         const selectedOption = variantSelect.options[variantSelect.selectedIndex];
//         const stock = parseInt(selectedOption.dataset.stock);
//         const quantity = parseInt(quantityInput.value);

//         if (quantity > stock) {
//             e.preventDefault();
//             alert('Số lượng vượt quá tồn kho! Vui lòng chọn số lượng nhỏ hơn hoặc bằng ' + stock);
//         }
//     });
// });
document.addEventListener('DOMContentLoaded', function () {
    const variantSelect = document.getElementById('variant_id');
    const priceDisplay = document.getElementById('variant-price');
    const stockDisplay = document.getElementById('variant-stock');
    const quantityInput = document.getElementById('quantity');
    const form = document.getElementById('add-to-cart-form');
    const btnSubmit = document.getElementById('btnSubmit');

    variantSelect.addEventListener('change', function () {
        const selectedOption = this.options[this.selectedIndex];
        if(selectedOption.value !== ''){
            const price = parseInt(selectedOption.dataset.price) || 0;
            const stock = parseInt(selectedOption.dataset.stock) || 0;

            if(stock==0){
                btnSubmit.innerHTML =  `<i class="bi bi-cart-plus"></i> Tạm hết hàng`
                btnSubmit.disabled = true;
            }else{
                btnSubmit.innerHTML = `<i class="bi bi-cart-plus"></i> Thêm vào giỏ hàng`
                btnSubmit.disabled = false;
            }
            // Cập nhật giá và tồn kho
            priceDisplay.textContent = price ? price.toLocaleString('vi-VN') + '₫' : '—';
            stockDisplay.textContent = stock ? stock : 'hết hàng';

            // Giới hạn số lượng nhập
            quantityInput.max = stock;
        }else{
            const totalProduct = document.getElementById('quantityProduct').value;
            stockDisplay.textContent = totalProduct ? totalProduct : '—';
            quantityInput.max = totalProduct;
        }
        
    });

    form.addEventListener('submit', function (e) {
        const selectedOption = variantSelect.options[variantSelect.selectedIndex];
        const stock = parseInt(selectedOption.dataset.stock) || 0;
        const quantity = parseInt(quantityInput.value);

        if (!selectedOption.value) {
            e.preventDefault();
            alert('Vui lòng chọn biến thể sản phẩm!');
            return;
        }

        if (quantity > stock) {
            e.preventDefault();
            alert('Số lượng vượt quá tồn kho! Vui lòng chọn số lượng nhỏ hơn hoặc bằng ' + stock);
        }
    });
});
</script>
