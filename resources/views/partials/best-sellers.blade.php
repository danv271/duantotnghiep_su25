<section id="best-sellers" class="best-sellers section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Best Sellers</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div>
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            @foreach([
                [
                    'image' => 'product-1.webp',
                    'image_variant' => 'product-1-variant.webp',
                    'badge' => 'New',
                    'title' => 'Lorem ipsum dolor sit amet',
                    'price' => '$89.99',
                    'rating' => 4.5,
                    'rating_count' => 42
                ],
                [
                    'image' => 'product-4.webp',
                    'image_variant' => 'product-4-variant.webp',
                    'badge' => 'Sale',
                    'title' => 'Consectetur adipiscing elit',
                    'price' => '$64.99',
                    'original_price' => '$79.99',
                    'rating' => 4,
                    'rating_count' => 28
                ],
                [
                    'image' => 'product-7.webp',
                    'image_variant' => 'product-7-variant.webp',
                    'title' => 'Sed do eiusmod tempor incididunt',
                    'price' => '$119.00',
                    'rating' => 5,
                    'rating_count' => 56
                ],
                [
                    'image' => 'product-12.webp',
                    'image_variant' => 'product-12-variant.webp',
                    'badge' => 'Sold Out',
                    'title' => 'Ut labore et dolore magna aliqua',
                    'price' => '$75.50',
                    'rating' => 3,
                    'rating_count' => 15,
                    'sold_out' => true
                ]
            ] as $index => $product)
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ 100 + ($index * 50) }}">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('assets/img/product/' . $product['image']) }}" class="img-fluid default-image" alt="Product" loading="lazy">
                            <img src="{{ asset('assets/img/product/' . $product['image_variant']) }}" class="img-fluid hover-image" alt="Product hover" loading="lazy">
                            @if(isset($product['badge']))
                                <div class="product-tags">
                                    <span class="badge bg-{{ strtolower($product['badge']) }}">{{ $product['badge'] }}</span>
                                </div>
                            @endif
                            <div class="product-actions">
                                <button class="btn-wishlist" type="button" aria-label="Add to wishlist">
                                    <i class="bi bi-heart"></i>
                                </button>
                                <button class="btn-quickview" type="button" aria-label="Quick view">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title"><a href="{{ url('product-details') }}">{{ $product['title'] }}</a></h3>
                            <div class="product-price">
                                <span class="current-price">{{ $product['price'] }}</span>
                                @if(isset($product['original_price']))
                                    <span class="original-price">{{ $product['original_price'] }}</span>
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
                                <span class="rating-count">({{ $product['rating_count'] }})</span>
                            </div>
                            <button class="btn btn-add-to-cart @if(isset($product['sold_out']) && $product['sold_out']) btn-disabled @endif" @if(isset($product['sold_out']) && $product['sold_out']) disabled @endif>
                                <i class="bi bi-bag-plus me-2"></i>{{ isset($product['sold_out']) && $product['sold_out'] ? 'Sold Out' : 'Add to Cart' }}
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>