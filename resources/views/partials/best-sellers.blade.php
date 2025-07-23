<section id="best-sellers" class="best-sellers section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Sản Phẩm Mới</h2>
        <p>Tập hợp tất cả phụ kiện thông minh và đa năng dànnh cho smartphone của bạn từ cáp sạc, củ sạc, pin dự phòng đến tai nghe, loa bluetooth,…..</p>
    </div>
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            @foreach($newProducts as $index => $product)
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ 100 + ($index * 50) }}">
                    <div class="product-card">
                        <div class="product-image">
                            @foreach($product->images as $image)
                                @if ($image->is_featured == 1)
                                    <img src="{{ asset('storage/'.$image->path) }}" class="img-fluid default-image" alt="Product" loading="lazy">
                                    <img src="{{ asset('storage/'.$image->path) }}" class="img-fluid hover-image" alt="Product hover" loading="lazy">
                                @endif
                            @endforeach
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
                            <h3 class="product-title"><a href="{{ route('products.show',$product->id) }}">{{ $product->name }}</a></h3>
                            <div class="product-price">
                                <span class="current-price">{{ $product->base_price }}</span>
                                @if(isset($product->base_price))
                                    <span class="original-price">{{ $product->base_price + $product->base_price/100 * 20}}</span>
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
                            <a href="{{ route('products.show' , $product->id) }}" class="btn btn-add-to-cart @if(isset($product->quantity) && $product->quantity<=0) btn-disabled @endif" @if(isset($product->quantity) && $product->quantity<=0) disabled @endif>
                                <i class="bi bi-bag-plus me-2"></i>{{ isset($product->quantity) && $product->quantity <= 0 ? 'Hết hàng' : 'Mua ngay' }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="text-center mt-5" data-aos="fade-up">
                <a href="{{ route('products.index','') }}" class="btn btn-primary rounded-pill">Xem tất cả sản phẩm <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>