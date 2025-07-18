<section id="product-list" class="product-list section">
    <div class="container isotope-layout" data-aos="fade-up" data-aos-delay="100" data-default-filter="*" data-layout="masonry" data-sort="original-order">
        @foreach($parentCategories as $parentCategory)
            <div class="row">
                <div class="container section-title" data-aos="fade-up">
                    <h2>{{ $parentCategory->category_name }}</h2>
                </div>
            </div>
            <div class="row product-container isotope-container" data-aos="fade-up" data-aos-delay="200">
                @foreach($parentCategory->children as $childCategory)
                    @foreach($childCategory->products as $product)
                        <div class="col-md-6 col-lg-3 product-item isotope-item filter-clothing">
                            <div class="product-card">
                                <div class="product-image">
                                    @foreach($product->images as $image)
                                        @if ($image->is_featured == 1)
                                            <img src="{{ asset('storage/'.$image->path) }}" alt="{{ $product->name }}" class="img-fluid main-img">
                                            <img src="{{ asset('storage/'.$image->path) }}" alt="{{ $product->name }}" class="img-fluid hover-img">
                                        @endif
                                    @endforeach
                                    <div class="product-overlay">
                                        <a href="{{ url('/products/' . $product->id) }}" class="btn-cart"><i class="bi bi-cart-plus"></i> Mua ngay</a>
                                        <div class="product-actions">
                                            <a href="#" class="action-btn"><i class="bi bi-heart"></i></a>
                                            <a href="{{ route('products.show', $product->id) }}" class="action-btn"><i class="bi bi-eye"></i></a>
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
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>
                                        <i class="bi bi-star"></i>
                                        <span>(0)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>
            <div class="text-center mt-5 mb-5" data-aos="fade-up">
                <a href="{{ route('products.index', $parentCategory->id) }}" class="view-all-btn">Xem tất cả sản phẩm <i class="bi bi-arrow-right"></i></a>
            </div>
        @endforeach
    </div>
</section>