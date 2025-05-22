<li class="products-megamenu-1">
    <a href="#"><span>Megamenu 1</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
    <!-- Products Mega Menu 1 Mobile View -->
    <ul class="mobile-megamenu">
        <li><a href="#">Featured Products</a></li>
        <li><a href="#">New Arrivals</a></li>
        <li><a href="#">Sale Items</a></li>
        <li class="dropdown"><a href="#"><span>Clothing</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                <li><a href="#">Men's Wear</a></li>
                <li><a href="#">Women's Wear</a></li>
                <li><a href="#">Kids Collection</a></li>
                <li><a href="#">Sportswear</a></li>
                <li><a href="#">Accessories</a></li>
            </ul>
        </li>
        <li class="dropdown"><a href="#"><span>Electronics</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                <li><a href="#">Smartphones</a></li>
                <li><a href="#">Laptops</a></li>
                <li><a href="#">Audio Devices</a></li>
                <li><a href="#">Smart Home</a></li>
                <li><a href="#">Accessories</a></li>
            </ul>
        </li>
        <li class="dropdown"><a href="#"><span>Home & Living</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                <li><a href="#">Furniture</a></li>
                <li><a href="#">Decor</a></li>
                <li><a href="#">Kitchen</a></li>
                <li><a href="#">Bedding</a></li>
                <li><a href="#">Lighting</a></li>
            </ul>
        </li>
        <li class="dropdown"><a href="#"><span>Beauty</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                <li><a href="#">Skincare</a></li>
                <li><a href="#">Makeup</a></li>
                <li><a href="#">Haircare</a></li>
                <li><a href="#">Fragrances</a></li>
                <li><a href="#">Personal Care</a></li>
            </ul>
        </li>
    </ul>
    <!-- Products Mega Menu 1 Desktop View -->
    <div class="desktop-megamenu">
        <div class="megamenu-tabs">
            <ul class="nav nav-tabs" id="productMegaMenuTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="featured-tab" data-bs-toggle="tab" data-bs-target="#featured-content-1862" type="button" aria-selected="true" role="tab">Featured</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="new-tab" data-bs-toggle="tab" data-bs-target="#new-content-1862" type="button" aria-selected="false" tabindex="-1" role="tab">New Arrivals</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="sale-tab" data-bs-toggle="tab" data-bs-target="#sale-content-1862" type="button" aria-selected="false" tabindex="-1" role="tab">Sale</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="category-tab" data-bs-toggle="tab" data-bs-target="#category-content-1862" type="button" aria-selected="false" tabindex="-1" role="tab">Categories</button>
                </li>
            </ul>
        </div>
        <div class="megamenu-content tab-content">
            <div class="tab-pane fade show active" id="featured-content-1862" role="tabpanel" aria-labelledby="featured-tab">
                <div class="product-grid">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('assets/img/product/product-1.webp') }}" alt="Featured Product" loading="lazy">
                        </div>
                        <div class="product-info">
                            <h5>Premium Headphones</h5>
                            <p class="price">$129.99</p>
                            <a href="#" class="btn-view">View Product</a>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('assets/img/product/product-2.webp') }}" alt="Featured Product" loading="lazy">
                        </div>
                        <div class="product-info">
                            <h5>Smart Watch</h5>
                            <p class="price">$199.99</p>
                            <a href="#" class="btn-view">View Product</a>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('assets/img/product/product-3.webp') }}" alt="Featured Product" loading="lazy">
                        </div>
                        <div class="product-info">
                            <h5>Wireless Earbuds</h5>
                            <p class="price">$89.99</p>
                            <a href="#" class="btn-view">View Product</a>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('assets/img/product/product-4.webp') }}" alt="Featured Product" loading="lazy">
                        </div>
                        <div class="product-info">
                            <h5>Bluetooth Speaker</h5>
                            <p class="price">$79.99</p>
                            <a href="#" class="btn-view">View Product</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="new-content-1862" role="tabpanel" aria-labelledby="new-tab">
                <div class="product-grid">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('assets/img/product/product-5.webp') }}" alt="New Arrival" loading="lazy">
                            <span class="badge-new">New</span>
                        </div>
                        <div class="product-info">
                            <h5>Fitness Tracker</h5>
                            <p class="price">$69.99</p>
                            <a href="#" class="btn-view">View Product</a>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('assets/img/product/product-6.webp') }}" alt="New Arrival" loading="lazy">
                            <span class="badge-new">New</span>
                        </div>
                        <div class="product-info">
                            <h5>Wireless Charger</h5>
                            <p class="price">$39.99</p>
                            <a href="#" class="btn-view">View Product</a>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('assets/img/product/product-7.webp') }}" alt="New Arrival" loading="lazy">
                            <span class="badge-new">New</span>
                        </div>
                        <div class="product-info">
                            <h5>Smart Bulb Set</h5>
                            <p class="price">$49.99</p>
                            <a href="#" class="btn-view">View Product</a>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('assets/img/product/product-8.webp') }}" alt="New Arrival" loading="lazy">
                            <span class="badge-new">New</span>
                        </div>
                        <div class="product-info">
                            <h5>Portable Power Bank</h5>
                            <p class="price">$59.99</p>
                            <a href="#" class="btn-view">View Product</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="sale-content-1862" role="tabpanel" aria-labelledby="sale-tab">
                <div class="product-grid">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('assets/img/product/product-9.webp') }}" alt="Sale Product" loading="lazy">
                            <span class="badge-sale">-30%</span>
                        </div>
                        <div class="product-info">
                            <h5>Wireless Keyboard</h5>
                            <p class="price"><span class="original-price">$89.99</span> $62.99</p>
                            <a href="#" class="btn-view">View Product</a>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('assets/img/product/product-10.webp') }}" alt="Sale Product" loading="lazy">
                            <span class="badge-sale">-25%</span>
                        </div>
                        <div class="product-info">
                            <h5>Gaming Mouse</h5>
                            <p class="price"><span class="original-price">$59.99</span> $44.99</p>
                            <a href="#" class="btn-view">View Product</a>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('assets/img/product/product-11.webp') }}" alt="Sale Product" loading="lazy">
                            <span class="badge-sale">-40%</span>
                        </div>
                        <div class="product-info">
                            <h5>Desk Lamp</h5>
                            <p class="price"><span class="original-price">$49.99</span> $29.99</p>
                            <a href="#" class="btn-view">View Product</a>
                        </div>
                    </div>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ asset('assets/img/product/product-12.webp') }}" alt="Sale Product" loading="lazy">
                            <span class="badge-sale">-20%</span>
                        </div>
                        <div class="product-info">
                            <h5>USB-C Hub</h5>
                            <p class="price"><span class="original-price">$39.99</span> $31.99</p>
                            <a href="#" class="btn-view">View Product</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="category-content-1862" role="tabpanel" aria-labelledby="category-tab">
                <div class="category-grid">
                    <div class="category-column">
                        <h4>Clothing</h4>
                        <ul>
                            <li><a href="#">Men's Wear</a></li>
                            <li><a href="#">Women's Wear</a></li>
                            <li><a href="#">Kids Collection</a></li>
                            <li><a href="#">Sportswear</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>
                    </div>
                    <div class="category-column">
                        <h4>Electronics</h4>
                        <ul>
                            <li><a href="#">Smartphones</a></li>
                            <li><a href="#">Laptops</a></li>
                            <li><a href="#">Audio Devices</a></li>
                            <li><a href="#">Smart Home</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>
                    </div>
                    <div class="category-column">
                        <h4>Home & Living</h4>
                        <ul>
                            <li><a href="#">Furniture</a></li>
                            <li><a href="#">Decor</a></li>
                            <li><a href="#">Kitchen</a></li>
                            <li><a href="#">Bedding</a></li>
                            <li><a href="#">Lighting</a></li>
                        </ul>
                    </div>
                    <div class="category-column">
                        <h4>Beauty</h4>
                        <ul>
                            <li><a href="#">Skincare</a></li>
                            <li><a href="#">Makeup</a></li>
                            <li><a href="#">Haircare</a></li>
                            <li><a href="#">Fragrances</a></li>
                            <li><a href="#">Personal Care</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>