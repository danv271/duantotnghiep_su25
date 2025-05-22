<section id="category-cards" class="category-cards section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="category-slider swiper init-swiper">
            <script type="application/json" class="swiper-config">
                {
                    "loop": true,
                    "autoplay": {
                        "delay": 5000,
                        "disableOnInteraction": false
                    },
                    "grabCursor": true,
                    "speed": 600,
                    "slidesPerView": "auto",
                    "spaceBetween": 20,
                    "navigation": {
                        "nextEl": ".swiper-button-next",
                        "prevEl": ".swiper-button-prev"
                    },
                    "breakpoints": {
                        "320": {
                            "slidesPerView": 2,
                            "spaceBetween": 15
                        },
                        "576": {
                            "slidesPerView": 3,
                            "spaceBetween": 15
                        },
                        "768": {
                            "slidesPerView": 4,
                            "spaceBetween": 20
                        },
                        "992": {
                            "slidesPerView": 5,
                            "spaceBetween": 20
                        },
                        "1200": {
                            "slidesPerView": 6,
                            "spaceBetween": 20
                        }
                    }
                }
            </script>
            <div class="swiper-wrapper">
                @foreach([
                    ['image' => 'product-1.webp', 'title' => 'Vestibulum ante', 'count' => '4 Products'],
                    ['image' => 'product-6.webp', 'title' => 'Maecenas nec', 'count' => '8 Products'],
                    ['image' => 'product-9.webp', 'title' => 'Aenean tellus', 'count' => '4 Products'],
                    ['image' => 'product-f-1.webp', 'title' => 'Donec quam', 'count' => '12 Products'],
                    ['image' => 'product-10.webp', 'title' => 'Phasellus leo', 'count' => '4 Products'],
                    ['image' => 'product-m-1.webp', 'title' => 'Quisque rutrum', 'count' => '2 Products'],
                    ['image' => 'product-10.webp', 'title' => 'Etiam ultricies', 'count' => '4 Products'],
                    ['image' => 'product-2.webp', 'title' => 'Fusce fermentum', 'count' => '4 Products']
                ] as $index => $category)
                    <div class="swiper-slide">
                        <div class="category-card" data-aos="fade-up" data-aos-delay="{{ 100 + ($index * 100) }}">
                            <div class="category-image">
                                <img src="{{ asset('assets/img/product/' . $category['image']) }}" alt="Category" class="img-fluid">
                            </div>
                            <h3 class="category-title">{{ $category['title'] }}</h3>
                            <p class="category-count">{{ $category['count'] }}</p>
                            <a href="{{ url('category') }}" class="stretched-link"></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>