<section id="product-list" class="product-list section">
    <div class="container isotope-layout" data-aos="fade-up" data-aos-delay="100" data-default-filter="*" data-layout="masonry" data-sort="original-order">
        <div class="row">
            <div class="col-12">
                <div class="product-filters isotope-filters mb-5 d-flex justify-content-center" data-aos="fade-up">
                    <ul class="d-flex flex-wrap gap-2 list-unstyled">
                        <li class="filter-active" data-filter="*">All</li>
                        <li data-filter=".filter-clothing">Clothing</li>
                        <li data-filter=".filter-accessories">Accessories</li>
                        <li data-filter=".filter-electronics">Electronics</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row product-container isotope-container" data-aos="fade-up" data-aos-delay="200">
            @foreach($products as $product)
                <div class="col-md-6 col-lg-3 product-item isotope-item filter-clothing">
                    <div class="product-card">
                        <div class="product-image">
                            <span class="badge">New</span>
                            <img src="{{ asset('assets/img/product/default.webp') }}" alt="{{ $product->name }}" class="img-fluid main-img">
                            <img src="{{ asset('assets/img/product/default-variant.webp') }}" alt="{{ $product->name }}" class="img-fluid hover-img">
                            <div class="product-overlay">
                                <a href="{{ url('cart') }}" class="btn-cart"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                                <div class="product-actions">
                                    <a href="#" class="action-btn"><i class="bi bi-heart"></i></a>
                                    <a href="{{ url('/products/' . $product->id) }}" class="action-btn"><i class="bi bi-eye"></i></a>
                                    <a href="#" class="action-btn"><i class="bi bi-arrow-left-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5 class="product-title">
                                <a href="{{ url('/products/' . $product->id) }}">{{ $product->name }}</a>
                            </h5>
                            <div class="product-price">
                                <span class="current-price">{{ number_format($product->base_price, 0) }}₫</span>
                            </div>
                            <div class="product-rating">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i><i class="bi bi-star"></i>
                                <span>(0)</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <a href="#" class="view-all-btn">View All Products <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
</section>