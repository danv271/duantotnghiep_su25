@extends('layouts.app')

@section('title', 'Category - eStore')

@section('body-class', 'category-page')

@section('content')

<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Sản phẩm</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ route('home') }}">Trang chủ</a></li>
            <li class="current">{{ $category->name ?? 'Sản phẩm' }}</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <div class="container">
      <div class="row">

        <div class="col-lg-4 sidebar">
          <div class="widgets-container">

            <!-- Product Categories Widget -->
            <div class="product-categories-widget widget-item">
              <h3 class="widget-title">Danh mục</h3>
              <ul class="category-tree list-unstyled mb-0">
                @foreach ($categories as $cat)
                  <li class="category-item">
                    <div class="d-flex justify-content-between align-items-center category-header {{ $cat->children->isEmpty() ? '' : 'collapsed' }}" 
                         @if (!$cat->children->isEmpty()) data-bs-toggle="collapse" data-bs-target="#categories-{{ $cat->id }}-subcategories" aria-expanded="false" aria-controls="categories-{{ $cat->id }}-subcategories" @endif>
                      <a href="{{ route('products.index', $cat->id) }}" class="category-link {{ $category->id ?? null == $cat->id ? 'active' : '' }}">{{ $cat->category_name }}</a>
                      @if (!$cat->children->isEmpty())
                        <span class="category-toggle">
                          <i class="bi bi-chevron-down"></i>
                          <i class="bi bi-chevron-up"></i>
                        </span>
                      @endif
                    </div>
                    @if (!$cat->children->isEmpty())
                      <ul id="categories-{{ $cat->id }}-subcategories" class="subcategory-list list-unstyled collapse ps-3 mt-2">
                        @foreach ($cat->children as $child)
                          <li><a href="{{ route('products.index', $child->id) }}" class="subcategory-link {{ request('sub_category') == $child->id ? 'active' : '' }}">{{ $child->category_name }}</a></li>
                        @endforeach
                      </ul>
                    @endif
                  </li>
                @endforeach
              </ul>
            </div><!--/Product Categories Widget -->

            <!-- Pricing Range Widget -->
            <div class="pricing-range-widget widget-item">
              <h3 class="widget-title">Price Range</h3>
              <form method="GET" action="{{ route('products.index', $category->id ?? '') }}">
                <div class="price-range-container">
                  <div class="current-range mb-3">
                    <span class="min-price">{{ number_format(request('min_price', 0)) }} VND</span>
                    <span class="max-price float-end">{{ number_format(request('max_price', 10000000)) }} VND</span>
                  </div>
                  <div class="range-slider">
                    <div class="slider-track"></div>
                    <div class="slider-progress"></div>
                    <input type="range" class="min-range" name="min_price" min="0" max="10000000" value="{{ request('min_price', 0) }}" step="10000">
                    <input type="range" class="max-range" name="max_price" min="0" max="10000000" value="{{ request('max_price', 10000000) }}" step="10000">
                  </div>
                  <div class="price-inputs mt-3">
                    <div class="row g-2">
                      <div class="col-6">
                        <div class="input-group input-group-sm">
                          <span class="input-group-text">VND</span>
                          <input type="number" class="form-control min-price-input" name="min_price" placeholder="Min" min="0" max="10000000" value="{{ request('min_price', 0) }}" step="10000">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="input-group input-group-sm">
                          <span class="input-group-text">VND</span>
                          <input type="number" class="form-control max-price-input" name="max_price" placeholder="Max" min="0" max="10000000" value="{{ request('max_price', 10000000) }}" step="10000">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="filter-actions mt-3">
                    <button type="submit" class="btn btn-sm btn-primary w-100">Áp dụng lọc</button>
                  </div>
                </div>
              </form>
            </div><!--/Pricing Range Widget -->

          </div>
        </div>

        <div class="col-lg-8">

          <!-- Category Header Section -->
          <section id="category-header" class="category-header section">
            <div class="container" data-aos="fade-up">
              <form method="GET" action="{{ route('products.index', $category->id ?? '') }}">
                <div class="filter-container mb-4" data-aos="fade-up" data-aos-delay="100">
                  <div class="row g-3">
                    <div class="col-12 col-md-6 col-lg-12">
                      <div class="filter-item search-form">
                        <label for="productSearch" class="form-label">Tìm sản phẩm</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="productSearch" name="search" placeholder="Search for products..." value="{{ request('search') }}">
                          <button class="btn search-btn" type="submit">
                            <i class="bi bi-search"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </section><!-- /Category Header Section -->

          <!-- Category Product List Section -->
          <section id="category-product-list" class="category-product-list section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
              <div class="row gy-4">
                @forelse ($products as $product)
                  <div class="col-lg-6">
                    <a href="{{ route('products.show', $product->id) }}">
                    <div class="product-box">
                      <div class="product-thumb">
                        @if ($product->is_featured)
                          <span class="product-label product-label-hot">Hot</span>
                        @endif
                        @foreach ($product->images as $image)
                            @if ($image->is_featured == 1)
                                <img src="{{ asset('storage/'.$image->path) }}" alt="{{ $product->name }}" class="main-img" loading="lazy">
                            @endif
                        @endforeach
                        
                        <div class="product-overlay">
                          <div class="product-quick-actions">
                            <button type="button" class="quick-action-btn">
                              <i class="bi bi-heart"></i>
                            </button>
                            <button type="button" class="quick-action-btn">
                              <i class="bi bi-arrow-repeat"></i>
                            </button>
                            <button type="button" class="quick-action-btn">
                              <i class="bi bi-eye"></i>
                            </button>
                          </div>
                          <div class="add-to-cart-container">
                            <button type="button" class="add-to-cart-btn">Mua ngay</button>
                          </div>
                        </div>
                      </div>
                      <div class="product-content">
                        <div class="product-details">
                          <h3 class="product-title"><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></h3>
                          <div class="product-price">
                            @if ($product->base_price)
                              <span class="sale">{{ number_format($product->base_price, 0) }} VND</span>
                            @else
                              <span>{{ number_format($product->price, 0) }} VND</span>
                            @endif
                          </div>
                        </div>
                        <div class="product-rating-container">
                          <div class="rating-stars">
                            @for ($i = 1; $i <= 5; $i++)
                              <i class="bi {{ $i <= $product->rating ? 'bi-star-fill' : ($i - 0.5 == $product->rating ? 'bi-star-half' : 'bi-star') }}"></i>
                            @endfor
                          </div>
                          <span class="rating-number">{{ number_format($product->rating, 1) }}</span>
                        </div>
                        <div class="product-color-options">
                          @foreach ($product->colors ?? [] as $color)
                            <span class="color-option {{ $color['active'] ? 'active' : '' }}" style="background-color: {{ $color['code'] }}"></span>
                          @endforeach
                        </div>
                      </div>
                    </div>
                    </a>
                  </div>
                @empty
                  <div class="col-12">
                    <p>Không tìm thấy sản phẩm nào.</p>
                  </div>
                @endforelse
              </div>
            </div>
          </section><!-- /Category Product List Section -->

          <!-- Category Pagination Section -->
          <section id="category-pagination" class="category-pagination section">
            <div class="container">
              <nav class="d-flex justify-content-center" aria-label="Page navigation">
                {{ $products->links() }}
              </nav>
            </div>
          </section><!-- /Category Pagination Section -->

        </div>

      </div>
    </div>

  </main>

@endsection