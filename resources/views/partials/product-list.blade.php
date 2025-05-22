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
            @foreach([
                [
                    'image' => 'product-11.webp',
                    'image_variant' => 'product-11-variant.webp',
                    'badge' => 'Sale',
                    'title' => 'Lorem ipsum dolor sit amet',
                    'price' => '$89.99',
                    'old_price' => '$129.99',
                    'rating' => 4.5,
                    'rating_count' => 24,
                    'filter' => 'clothing'
                ],
                [
                    'image' => 'product-9.webp',
                    'image_variant' => 'product-9-variant.webp',
                    'title' => 'Consectetur adipiscing elit',
                    'price' => '$249.99',
                    'rating' => 4,
                    'rating_count' => 18,
                    'filter' => 'electronics'
                ],
                [
                    'image' => 'product-3.webp',
                    'image_variant' => 'product-3-variant.webp',
                    'badge' => 'New',
                    'title' => 'Sed do eiusmod tempor',
                    'price' => '$59.99',
                    'rating' => 3,
                    'rating_count' => 7,
                    'filter' => 'accessories'
                ],
                [
                    'image' => 'product-4.webp',
                    'image_variant' => 'product-4-variant.webp',
                    'title' => 'Incididunt ut labore et dolore',
                    'price' => '$79.99',
                    'old_price' => '$99.99',
                    'rating' => 5,
                    'rating_count' => 32,
                    'filter' => 'clothing'
                ],
                [
                    'image' => 'product-5.webp',
                    'image_variant' => 'product-5-variant.webp',
                    'badge' => 'Sale',
                    'title' => 'Magna aliqua ut enim ad minim',
                    'price' => '$199.99',
                    'old_price' => '$249.99',
                    'rating' => 3.5,
                    'rating_count' => 15,
                    'filter' => 'electronics'
                ],
                [
                    'image' => 'product-6.webp',
                    'image_variant' => 'product-6-variant.webp',
                    'title' => 'Veniam quis nostrud exercitation',
                    'price' => '$45.99',
                    'rating' => 4,
                    'rating_count' => 21,
                    'filter' => 'accessories'
                ],
                [
                    'image' => 'product-7.webp',
                    'image_variant' => 'product-7-variant.webp',
                    'badge' => 'New',
                    'title' => 'Ullamco laboris nisi ut aliquip',
                    'price' => '$69.99',
                    'rating' => 3.5,
                    'rating_count' => 11,
                    'filter' => 'clothing'
                ],
                [
                    'image' => 'product-8.webp',
                    'image_variant' => 'product-8-variant.webp',
                    'title' => 'Ex ea commodo consequat',
                    'price' => '$159.99',
                    'rating' => 5,
                    'rating_count' => 29,
                    'filter' => 'electronics'
                ]
            ] as $product)
                <div class="col-md-6 col-lg-3 product-item isotope-item filter-{{ $product['filter'] }}">
                    <div class="product-card">
                        <div class="product-image">
                            @if(isset($product['badge']))
                                <span class="badge">{{ $product['badge'] }}</span>
                            @endif
                            <img src="{{ asset('assets/img/product/' . $product['image']) }}" alt="Product" class="img-fluid main-img">
                            <img src="{{ asset('assets/img/product/' . $product['image_variant']) }}" alt="Product Hover" class="img-fluid hover-img">
                            <div class="product-overlay">
                                <a href="{{ url('cart') }}" class="btn-cart"><i class="bi bi-cart-plus"></i> Add to Cart</a>
                                <div class="product-actions">
                                    <a href="#" class="action-btn"><i class="bi bi-heart"></i></a>
                                    <a href="#" class="action-btn"><i class="bi bi-eye"></i></a>
                                    <a href="#" class="action-btn"><i class="bi bi-arrow-left-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="product-info">
                            <h5 class="product-title"><a href="{{ url('product-details') }}">{{ $product['title'] }}</a></h5>
                            <div class="product-price">
                                <span class="current-price">{{ $product['price'] }}</span>
                                @if(isset($product['old_price']))
                                    <span class="old-price">{{ $product['old_price'] }}</span>
                                @endif
                            </div>
                            <div class="product-rating">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= floor($product['rating']))
                                        <i class="bi bi-star-fill"></i>
                                    @elseif($i == ceil($product['rating']) && $product['rating'] - floor($product['rating']) >= 0.5)
                                        <i class="bi bi-star-half"></i>
                                    @else
                                        <i class="bi bi-star"></i>
                                    @endif
                                @endfor
                                <span>({{ $product['rating_count'] }})</span>
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