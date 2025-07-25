@extends('layouts.app')

@section('title', 'Checkout - eStore')

@section('body-class', 'checkout-page')

@section('content')
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Checkout</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="current">Checkout</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Checkout Section -->
    <section id="checkout" class="checkout section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-7">
                    <!-- Checkout Form -->
                    <div class="checkout-container" data-aos="fade-up">
                        <form method="POST" action="{{ route('checkout.process') }}">
                            @csrf
                            <!-- Customer Information -->
                            <div class="checkout-section" id="customer-info">
                                <div class="section-header">
                                    <div class="section-number">1</div>
                                    <h3>Thông tin khách hàng</h3>
                                </div>
                                <div class="section-content">
                                        <div class="form-group">
                                            <label for="first-name">Tên người nhận</label>
                                            <input type="text" name="name" class="form-control" id="first-name" value="{{ Auth::check() ? $user->name : old('first-name') }}" required>
                                            @error('first_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" value="{{ Auth::check() ? $user->email : old('email') }}" required>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="tel" class="form-control" name="phone" id="phone" value="{{ Auth::check() ? $user->phone : old('phone') }}" required>
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Shipping Address -->
                            <div class="checkout-section" id="shipping-address">
                                <div class="section-header">
                                    <div class="section-number">2</div>
                                    <h3>Địa chỉ giao hàng</h3>
                                </div>
                                <div class="section-content">
                                    <div class="form-group">
                                        <label for="address">Địa chỉ</label>
                                        <input type="text" class="form-control" name="address" id="address" value="{{ Auth::check() ? $user->phone : old('address') }}" required>
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="apartment">Ghi chú</label>
                                        <input type="text" class="form-control" name="note" id="apartment" value="{{ old('apartment') }}">
                                    </div>
                                    
                                </div>
                            </div>

                            <!-- Payment Method -->
                            <div class="checkout-section" id="payment-method">
                                <div class="section-header">
                                    <div class="section-number">3</div>
                                    <h3>Phương thức thanh toán</h3>
                                </div>
                                <div class="section-content">
                                    <div class="payment-options">
                                        <div class="payment-option active">
                                            <input type="radio" name="payment_method" id="credit-card" value="cash" {{ old('payment_method', 'cash') == 'cash' ? 'checked' : '' }} required>
                                            <label for="credit-card">
                                                <span class="payment-icon"><i class="bi bi-truck"></i></span>
                                                <span class="payment-label">Thanh toán khi nhận hàng</span>
                                            </label>
                                        </div>
                                        <div class="payment-option">
                                            <input type="radio" name="payment_method" id="paypal" value="transfer" {{ old('payment_method') == 'transfe' ? 'checked' : '' }}>
                                            <label for="paypal">
                                                <span class="payment-icon"><i class="bi bi-credit-card-2-front"></i></span>
                                                <span class="payment-label">Thanh toán Online</span>
                                            </label>
                                        </div>
                                    </div>

                                    {{-- <div class="payment-details" id="credit-card-details" style="{{ old('payment_method', 'credit_card') == 'credit_card' ? '' : 'display: none;' }}">
                                        <div class="form-group">
                                            <label for="card-number">Card Number</label>
                                            <div class="card-number-wrapper">
                                                <input type="text" class="form-control" name="card_number" id="card-number" placeholder="1234 5678 9012 3456" value="{{ old('card_number') }}" {{ old('payment_method', 'credit_card') == 'credit_card' ? 'required' : '' }}>
                                                <div class="card-icons">
                                                    <i class="bi bi-credit-card-2-front"></i>
                                                    <i class="bi bi-credit-card"></i>
                                                </div>
                                            </div>
                                            @error('card_number')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label for="expiry">Expiration Date</label>
                                                <input type="text" class="form-control" name="expiry" id="expiry" placeholder="MM/YY" value="{{ old('expiry') }}" {{ old('payment_method', 'credit_card') == 'credit_card' ? 'required' : '' }}>
                                                @error('expiry')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="cvv">Security Code (CVV)</label>
                                                <div class="cvv-wrapper">
                                                    <input type="text" class="form-control" name="cvv" id="cvv" placeholder="123" value="{{ old('cvv') }}" {{ old('payment_method', 'credit_card') == 'credit_card' ? 'required' : '' }}>
                                                    <span class="cvv-hint" data-bs-toggle="tooltip" data-bs-placement="top" title="3-digit code on the back of your card">
                                                        <i class="bi bi-question-circle"></i>
                                                    </span>
                                                </div>
                                                @error('cvv')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="card-name">Name on Card</label>
                                            <input type="text" class="form-control" name="card_name" id="card-name" placeholder="John Doe" value="{{ old('card_name') }}" {{ old('payment_method', 'credit_card') == 'credit_card' ? 'required' : '' }}>
                                            @error('card_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="payment-details" id="paypal-details" style="{{ old('payment_method') == 'paypal' ? '' : 'display: none;' }}">
                                        <p class="payment-info">You will be redirected to PayPal to complete your purchase securely.</p>
                                    </div>

                                    <div class="payment-details" id="apple-pay-details" style="{{ old('payment_method') == 'apple_pay' ? '' : 'display: none;' }}">
                                        <p class="payment-info">You will be prompted to authorize payment with Apple Pay.</p>
                                    </div> --}}
                                </div>
                            </div>
                            
                            <!-- Order Review -->
                            <div class="checkout-section" id="order-review">
                                <div class="section-header">
                                    <div class="section-number">4</div>
                                    <h3>Xác nhận thanh toán</h3>
                                </div>
                                <div class="section-content">
                                    {{-- <div class="form-check terms-check">
                                        <input class="form-check-input" type="checkbox" id="terms" name="terms" {{ old('terms') ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="terms">
                                            Tôi đồng ý <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">các điều khoản</a> và <a href="#" data-bs-toggle="modal" data-bs-target="#privacyModal">chính sách</a>
                                        </label>
                                        @error('terms')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="success-message d-none">Your order has been placed successfully! Thank you for your purchase.</div> --}}
                                    <div class="place-order-container">
                                        <input type="hidden" name="total" value="{{$total}}">
                                        <button type="submit" class="btn btn-primary place-order-btn">
                                            <span class="btn-text">Thanh toán</span>
                                            <span class="btn-price">{{ number_format($total,0,',','.')}} vnđ</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-5">
                    <!-- Order Summary -->
                    <div class="order-summary" data-aos="fade-left" data-aos-delay="200">
                        <div class="order-summary-header">
                            <h3>Order Summary</h3>
                            <span class="item-count">2 Items</span>
                        </div>
                        <div class="order-summary-content">
                            <div class="order-items">
                                @if (is_array($cartItems))
                                     @forEach($cartItems as $item)
                                        <div class="order-item">
                                            <div class="order-item-image">
                                                <img src="{{ asset('storage/'.$item['image_path']) }}" alt="Product" class="img-fluid">
                                            </div>
                                            <div class="order-item-details">
                                                <h4>{{$item['product_name']}}</h4>
                                                <p class="order-item-variant">1</p>
                                                <div class="order-item-price">
                                                    <span class="quantity">{{$item['quantity']}} ×</span>
                                                    <span class="price">{{ number_format($item['price'],0,',','.')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                     @forEach($cartItems as $item)
                                        <div class="order-item">
                                            <div class="order-item-image">
                                                <img src="{{ asset('storage/'.$item->image_path) }}" alt="Product" class="img-fluid">
                                            </div>
                                            <div class="order-item-details">
                                                <h4>{{$item->product_name}}</h4>
                                                <p class="order-item-variant"></p>
                                                <div class="order-item-price">
                                                    <span class="quantity">{{$item->quantity}} ×</span>
                                                    <span class="price">{{ number_format($item->variant_price,0,',','.')}} vnđ</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            
                                {{-- <div class="order-item">
                                    <div class="order-item-image">
                                        <img src="{{ asset('estore/img/product/product-2.webp') }}" alt="Product" class="img-fluid">
                                    </div>
                                    <div class="order-item-details">
                                        <h4>Sit Amet Consectetur</h4>
                                        <p class="order-item-variant">Color: White | Size: L</p>
                                        <div class="order-item-price">
                                            <span class="quantity">2 ×</span>
                                            <span class="price">$59.99</span>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>

                            <div class="promo-code">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="promo_code" placeholder="Promo Code" aria-label="Promo Code" value="{{ old('promo_code') }}">
                                    <button class="btn btn-outline-primary" type="button">Apply</button>
                                </div>
                                @error('promo_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="order-totals">
                                <div class="order-subtotal d-flex justify-content-between">
                                    <span>Thành tiền</span>
                                    <span>{{number_format($subtotal,0,',','.')}} vnđ</span>
                                </div>
                                <div class="order-shipping d-flex justify-content-between">
                                    <span>Phí vận chuyển</span>
                                    <span>{{number_format($shipping,0,',','.')}} vnđ</span>
                                </div>
                                <div class="order-total d-flex justify-content-between">
                                    <span>Tổng tiền</span>
                                    <span>{{number_format($total,0,',','.')}} vnđ</span>
                                </div>
                            </div>

                            <div class="secure-checkout">
                                <div class="secure-checkout-header">
                                    <i class="bi bi-shield-lock"></i>
                                    <span>Secure Checkout</span>
                                </div>
                                <div class="payment-icons">
                                    <i class="bi bi-credit-card-2-front"></i>
                                    <i class="bi bi-credit-card"></i>
                                    <i class="bi bi-paypal"></i>
                                    <i class="bi bi-apple"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Terms and Privacy Modals -->
            <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor.</p>
                            <p>Suspendisse in orci enim. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor.</p>
                            <p>Suspendisse in orci enim. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">I Understand</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="privacyModalLabel">Privacy Policy</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim.</p>
                            <p>Suspendisse in orci enim. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor.</p>
                            <p>Suspendisse in orci enim. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">I Understand</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Checkout Section -->
@endsection

@push('scripts')
    <script>
        // JavaScript to toggle payment details based on payment method selection
        document.querySelectorAll('input[name="payment_method"]').forEach(function(radio) {
            radio.addEventListener('change', function() {
                document.querySelectorAll('.payment-details').forEach(function(details) {
                    details.style.display = 'none';
                });
                document.querySelectorAll('.payment-option').forEach(function(option) {
                    option.classList.remove('active');
                });
                const detailsId = this.id + '-details';
                document.getElementById(detailsId).style.display = 'block';
                this.closest('.payment-option').classList.add('active');

                // Update required attributes based on payment method
                const creditCardFields = ['card_number', 'expiry', 'cvv', 'card_name'];
                creditCardFields.forEach(function(field) {
                    const input = document.getElementById(field);
                    if (input) {
                        input.required = (radio.value === 'credit_card');
                    }
                });
            });
        });

        // Initialize tooltips
        document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function(element) {
            new bootstrap.Tooltip(element);
        });
    </script>
@endpush