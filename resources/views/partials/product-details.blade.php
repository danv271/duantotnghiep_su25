@extends('layouts.app')

@section('content')
<main class="main">

  <!-- Page Title -->
  <div class="page-title light-background">
    <div class="container d-lg-flex justify-content-between align-items-center">
      <h1 class="mb-2 mb-lg-0">Product Details</h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li class="current">Product Details</li>
        </ol>
      </nav>
    </div>
  </div>

  <!-- Product Details Section -->
  <section id="product-details" class="product-details section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row">
        <!-- Images -->
        <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right" data-aos-delay="200">
          <div class="product-images">
            <div class="main-image-container mb-3">
              <div class="image-zoom-container">
                <img src="{{ asset('assets/img/product/product-details-1.webp') }}" alt="Product Image" class="img-fluid main-image drift-zoom" id="main-product-image" data-zoom="{{ asset('assets/img/product/product-details-1.webp') }}">
              </div>
            </div>
            <div class="product-thumbnails">
              <!-- Swiper thumbnails -->
              @php
                $thumbnails = ['product-details-1.webp', 'product-details-2.webp', 'product-details-3.webp', 'product-details-4.webp', 'product-details-5.webp'];
              @endphp
              <div class="swiper product-thumbnails-slider init-swiper">
                <script type="application/json" class="swiper-config">
                  {
                    "loop": false,
                    "speed": 400,
                    "slidesPerView": 4,
                    "spaceBetween": 10,
                    "navigation": {
                      "nextEl": ".swiper-button-next",
                      "prevEl": ".swiper-button-prev"
                    },
                    "breakpoints": {
                      "320": { "slidesPerView": 3 },
                      "576": { "slidesPerView": 4 }
                    }
                  }
                </script>
                <div class="swiper-wrapper">
                  @foreach($thumbnails as $thumb)
                    <div class="swiper-slide thumbnail-item {{ $loop->first ? 'active' : '' }}" data-image="{{ asset('assets/img/product/' . $thumb) }}">
                      <img src="{{ asset('assets/img/product/' . $thumb) }}" class="img-fluid" alt="Thumbnail">
                    </div>
                  @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Product Info -->
        <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
          <div class="product-info">
            <div class="product-meta mb-2">
              <span class="product-category">Headphones</span>
              <div class="product-rating">
                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i>
                <span class="rating-count">(42)</span>
              </div>
            </div>

            <h1 class="product-title">Lorem Ipsum Wireless Noise Cancelling Headphones</h1>

            <div class="product-price-container mb-4">
              <span class="current-price">$249.99</span>
              <span class="original-price">$299.99</span>
              <span class="discount-badge">-17%</span>
            </div>

            <p class="product-short-description mb-4">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum at lacus congue, suscipit elit nec, tincidunt orci.
            </p>

            <div class="product-availability mb-4">
              <i class="bi bi-check-circle-fill text-success"></i> In Stock <span class="stock-count">(24 items left)</span>
            </div>

            <!-- Colors -->
            <div class="product-colors mb-4">
              <h6 class="option-title">Color:</h6>
              <div class="color-options">
                @php
                  $colors = [
                    ['name' => 'Black', 'color' => '#222'],
                    ['name' => 'Silver', 'color' => '#C0C0C0'],
                    ['name' => 'Blue', 'color' => '#1E3A8A'],
                    ['name' => 'Rose Gold', 'color' => '#B76E79'],
                  ];
                @endphp
                @foreach($colors as $i => $color)
                  <div class="color-option {{ $i == 0 ? 'active' : '' }}" data-color="{{ $color['name'] }}" style="background-color: {{ $color['color'] }};">
                    <i class="bi bi-check"></i>
                  </div>
                @endforeach
              </div>
              <span class="selected-option">Black</span>
            </div>

            <!-- Sizes -->
            <div class="product-sizes mb-4">
              <h6 class="option-title">Size:</h6>
              <div class="size-options">
                <div class="size-option" data-size="S">S</div>
                <div class="size-option active" data-size="M">M</div>
                <div class="size-option" data-size="L">L</div>
              </div>
              <span class="selected-option">M</span>
            </div>

            <!-- Quantity -->
            <div class="product-quantity mb-4">
              <h6 class="option-title">Quantity:</h6>
              <div class="quantity-selector">
                <button class="quantity-btn decrease"><i class="bi bi-dash"></i></button>
                <input type="number" class="quantity-input" value="1" min="1" max="24">
                <button class="quantity-btn increase"><i class="bi bi-plus"></i></button>
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="product-actions">
              <button class="btn btn-primary"><i class="bi bi-cart-plus"></i> Add to Cart</button>
              <button class="btn btn-outline-primary"><i class="bi bi-lightning-fill"></i> Buy Now</button>
              <button class="btn btn-outline-secondary"><i class="bi bi-heart"></i></button>
            </div>

            <!-- Extra Info -->
            <div class="additional-info mt-4">
              <div class="info-item"><i class="bi bi-truck"></i> Free shipping on orders over $50</div>
              <div class="info-item"><i class="bi bi-arrow-repeat"></i> 30-day return policy</div>
              <div class="info-item"><i class="bi bi-shield-check"></i> 2-year warranty</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Tabs Section -->
      <div class="row mt-5" data-aos="fade-up">
        <div class="col-12">
          @include('product-details.tabs')
        </div>
      </div>

    </div>
  </section>

</main>
@endsection
