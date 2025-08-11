@extends('layouts.app')

@section('title', 'Checkout - eStore')

@section('body-class', 'checkout-page')

@section('content')
<style>
    .voucher-card {
        transition: all 0.3s ease;
    }
    .voucher-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .voucher-card.border-success {
        border-color: #28a745 !important;
    }
    .voucher-card.border-secondary {
        border-color: #6c757d !important;
    }
    .badge {
        font-size: 0.75rem;
    }
    .card-title {
        font-size: 0.9rem;
        font-weight: 600;
    }
    .card-text {
        font-size: 0.8rem;
    }
    .btn-sm {
        font-size: 0.75rem;
        padding: 0.25rem 0.5rem;
    }
    code {
        background-color: #f8f9fa;
        padding: 0.2rem 0.4rem;
        border-radius: 0.25rem;
        font-size: 0.8rem;
    }
    .voucher-card.border-success {
        border-color: #28a745 !important;
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
    }
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }
    .alert-info {
        background-color: #d1ecf1;
        border-color: #bee5eb;
        color: #0c5460;
    }
    .voucher-section h6 {
        font-weight: 600;
        border-bottom: 2px solid;
        padding-bottom: 0.5rem;
    }
    .voucher-section h6.text-success {
        border-bottom-color: #28a745;
    }
    .voucher-section h6.text-primary {
        border-bottom-color: #007bff;
    }
    .voucher-section .text-muted {
        font-style: italic;
    }
</style>
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
                                        <label for="address">Địa chỉ cụ thể</label>
                                        <input type="text" class="form-control" name="address" id="address" value="{{ Auth::check() ? $user->address : old('address') }}" required>
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="row form-group">
                                        <div class="col">
                                            <label for="thanhPho">Tỉnh/Thành phố</label>
                                            <select class="form-control" name="thanhPho" id="thanhPho" required>
                                                <option value="">Chọn Tỉnh/Thành phố</option>
                                            </select>
                                            <input type="hidden" name="thanhPho_name" id="thanhPho_name">
                                            @error('thanhPho')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="quanHuyen">Quận/Huyện</label>
                                            <select class="form-control" name="quanHuyen" id="quanHuyen" required disabled>
                                                <option value="">Chọn Quận/Huyện</option>
                                            </select>
                                            <input type="hidden" name="quanHuyen_name" id="quanHuyen_name">
                                            @error('quanHuyen')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <label for="xaPhuong">Phường/Xã</label>
                                            <select class="form-control" name="xaPhuong" id="xaPhuong" required disabled>
                                                <option value="">Chọn Phường/Xã</option>
                                            </select>
                                            <input type="hidden" name="xaPhuong_name" id="xaPhuong_name">
                                            @error('xaPhuong')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="note">Ghi chú</label>
                                        <input type="text" class="form-control" name="note" id="note" value="{{ old('note') }}">
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
                                        <input type="hidden" name="total" id="total-input" value="{{$total}}">
                                        <input type="hidden" name="selected_items" id="selected-items-checkout" value="{{ request('selected_items') }}">
                                        <div id="voucher-codes-container"></div>
                                        <button type="submit" class="btn btn-primary place-order-btn">
                                            <span class="btn-text">Thanh toán</span>
                                            <span class="btn-price" id="btn-total-price">{{ number_format($total,0,',','.')}} vnđ</span>
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
                            <h3>Tóm tắt đơn hàng</h3>
                            <span class="item-count">2 sản phẩm</span>
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
                                                <p class="order-item-variant">Số lượng: {{$item['quantity']}}</p>
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
                                                <p class="order-item-variant">Số lượng: {{$item->quantity}}</p>
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

                            <!-- Voucher Section -->
                            <div class="checkout-section voucher-section" id="voucher-section">
                                <div class="section-header">
                                    <div class="section-number">3</div>
                                    <h3>Chọn voucher</h3>
                                </div>
                                <div class="section-content">
                                    <!-- Nhập mã voucher -->
                                    <div class="mb-3">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="voucher-code" placeholder="Nhập mã voucher">
                                            <button class="btn btn-outline-primary" type="button" id="apply-voucher">
                                                <i class="bi bi-plus-circle"></i> Áp dụng
                                            </button>
                                        </div>
                                        <div id="voucher-message"></div>
                                    </div>

                                    <!-- Voucher đã áp dụng -->
                                    <div id="applied-vouchers" class="mb-3 d-none">
                                        <h6 class="text-success">Voucher đã áp dụng:</h6>
                                        <div id="voucher-list"></div>
                                        <button type="button" class="btn btn-sm btn-outline-danger" id="remove-all-vouchers">
                                            <i class="bi bi-trash"></i> Xóa tất cả
                                        </button>
                                    </div>

                                    <!-- Danh sách voucher có sẵn -->
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-outline-info btn-sm" id="show-vouchers">
                                            <i class="bi bi-ticket-perforated"></i> Xem tất cả voucher
                                        </button>
                                    </div>
                            </div>
                            <!-- End Voucher Section -->

                            <div class="order-totals">
                                <div class="order-subtotal d-flex justify-content-between">
                                    <span>Thành tiền</span>
                                    <span id="subtotal-display">{{number_format($subtotal,0,',','.')}} vnđ</span>
                                </div>
                                <div class="order-shipping d-flex justify-content-between">
                                    <span>Phí vận chuyển</span>
                                    <span id="shipping-display">{{number_format($shipping,0,',','.')}} vnđ</span>
                                </div>
                                <div class="order-discount d-flex justify-content-between d-none">
                                    <span>Giảm giá sản phẩm</span>
                                    <span id="product-discount-display" class="text-success">-0 vnđ</span>
                                </div>
                                <div class="order-shipping-discount d-flex justify-content-between d-none">
                                    <span>Giảm phí vận chuyển</span>
                                    <span id="shipping-discount-display" class="text-success">-0 vnđ</span>
                                </div>
                                <div class="order-total d-flex justify-content-between">
                                    <span>Tổng tiền</span>
                                    <span id="total-display">{{number_format($total,0,',','.')}} vnđ</span>
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

            <!-- Vouchers Modal -->
            <div class="modal fade" id="vouchersModal" tabindex="-1" aria-labelledby="vouchersModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="vouchersModalLabel">Danh sách Voucher</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="alert alert-info mb-3">
                                <strong><i class="bi bi-info-circle"></i> Quy tắc chọn voucher:</strong>
                                <ul class="mb-0 mt-2">
                                    <li>Chỉ có thể chọn <strong>1 voucher miễn phí vận chuyển</strong></li>
                                    <li>Chỉ có thể chọn <strong>1 voucher giảm giá đơn hàng</strong></li>
                                    <li>Có thể kết hợp cả 2 loại voucher trên</li>
                                </ul>
                            </div>
                            
                            <!-- Voucher Ship Section -->
                            <div class="voucher-section mb-4">
                                <h6 class="text-success mb-3">
                                    <i class="bi bi-truck"></i> Voucher Miễn Phí Vận Chuyển
                                </h6>
                                <div class="row" id="shipping-vouchers-list">
                                    <!-- Shipping vouchers will be loaded here -->
                                </div>
                            </div>
                            
                            <!-- Voucher Order Section -->
                            <div class="voucher-section">
                                <h6 class="text-primary mb-3">
                                    <i class="bi bi-percent"></i> Voucher Giảm Giá Đơn Hàng
                                </h6>
                                <div class="row" id="order-vouchers-list">
                                    <!-- Order vouchers will be loaded here -->
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="apply-selected-vouchers">Áp dụng voucher đã chọn</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
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

        // Voucher functionality
        let appliedVouchers = [];
        let currentSubtotal = {{ $subtotal }};
        let currentShipping = {{ $shipping }};
        let currentTotal = {{ $total }};

        // Show vouchers modal
        document.getElementById('show-vouchers').addEventListener('click', function() {
            loadVouchers();
            const modal = new bootstrap.Modal(document.getElementById('vouchersModal'));
            modal.show();
        });

        // Apply voucher from input
        document.getElementById('apply-voucher').addEventListener('click', function() {
            const voucherCode = document.getElementById('voucher-code').value.trim();
            if (!voucherCode) {
                showVoucherMessage('Vui lòng nhập mã voucher!', 'danger');
                return;
            }

            // Kiểm tra xem voucher đã được áp dụng chưa
            if (appliedVouchers.some(v => v.code === voucherCode)) {
                showVoucherMessage('Voucher này đã được áp dụng!', 'warning');
                return;
            }

            // Thêm voucher mới vào danh sách
            appliedVouchers.push({
                code: voucherCode,
                name: voucherCode, // Tạm thời, sẽ được cập nhật sau
                type: 'unknown'
            });

            applyVouchers();
        });

        // Remove all vouchers
        document.getElementById('remove-all-vouchers').addEventListener('click', function() {
            appliedVouchers = [];
            fetch('{{ route("voucher.remove") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    order_amount: currentSubtotal,
                    shipping_cost: 30000 // Luôn gửi giá trị gốc
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    updateOrderSummary(data.data);
                    hideAppliedVouchers();
                    showVoucherMessage('Đã xóa tất cả voucher!', 'success');
                } else {
                    showVoucherMessage(data.message, 'danger');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showVoucherMessage('Có lỗi xảy ra khi xóa voucher!', 'danger');
            });
        });

        // Enter key to apply voucher
        document.getElementById('voucher-code').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                document.getElementById('apply-voucher').click();
            }
        });

        function applyVouchers() {
            if (appliedVouchers.length === 0) {
                hideAppliedVouchers();
                return;
            }

            const voucherCodes = appliedVouchers.map(v => v.code);

            fetch('{{ route("voucher.apply") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    voucher_codes: voucherCodes,
                    order_amount: currentSubtotal,
                    shipping_cost: currentShipping
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Cập nhật thông tin voucher từ server
                    appliedVouchers = data.data.vouchers;
                    updateOrderSummary(data.data);
                    showAppliedVouchers(data.data.vouchers);
                    showVoucherMessage(data.message, 'success');
                } else {
                    // Xóa voucher không hợp lệ
                    appliedVouchers = appliedVouchers.filter(v => !voucherCodes.includes(v.code));
                    showVoucherMessage(data.message, 'danger');
                    // Reload vouchers để cập nhật trạng thái
                    loadVouchers();
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showVoucherMessage('Có lỗi xảy ra khi áp dụng voucher!', 'danger');
            });
        }

        function updateOrderSummary(data) {
            // Update shipping cost
            document.getElementById('shipping-display').textContent = formatCurrency(data.new_shipping_cost) + ' vnđ';
            
            // Update product discount
            const productDiscount = data.product_discount || 0;
            if (productDiscount > 0) {
                document.querySelector('.order-discount').classList.remove('d-none');
                document.getElementById('product-discount-display').textContent = '-' + formatCurrency(productDiscount) + ' vnđ';
            } else {
                document.querySelector('.order-discount').classList.add('d-none');
            }
            
            // Update shipping discount
            const shippingDiscount = data.shipping_discount || 0;
            if (shippingDiscount > 0) {
                document.querySelector('.order-shipping-discount').classList.remove('d-none');
                document.getElementById('shipping-discount-display').textContent = '-' + formatCurrency(shippingDiscount) + ' vnđ';
            } else {
                document.querySelector('.order-shipping-discount').classList.add('d-none');
            }
            
            // Update total
            document.getElementById('total-display').textContent = formatCurrency(data.final_total) + ' vnđ';
            document.getElementById('total-input').value = data.final_total;
            document.getElementById('btn-total-price').textContent = formatCurrency(data.final_total) + ' vnđ';
            
            // Cập nhật giá trị hiện tại
            currentShipping = data.new_shipping_cost;
            currentTotal = data.final_total;
            if (typeof data.product_amount !== 'undefined') {
                currentSubtotal = data.product_amount;
            }
            // Update voucher codes for form submission
            updateVoucherCodes();
        }

        function updateVoucherCodes() {
            const container = document.getElementById('voucher-codes-container');
            container.innerHTML = '';
            
            appliedVouchers.forEach(voucher => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'voucher_codes[]';
                input.value = voucher.code;
                container.appendChild(input);
            });
        }

        function showAppliedVouchers(vouchers) {
            const container = document.getElementById('applied-vouchers');
            const voucherList = document.getElementById('voucher-list');
            
            container.classList.remove('d-none');
            voucherList.innerHTML = '';
            
            vouchers.forEach(voucher => {
                const voucherItem = document.createElement('div');
                voucherItem.className = 'd-flex justify-content-between align-items-center mb-1';
                voucherItem.innerHTML = `
                    <span>${voucher.name} (${voucher.code})</span>
                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeVoucher('${voucher.code}')">Xóa</button>
                `;
                voucherList.appendChild(voucherItem);
            });
        }

        function hideAppliedVouchers() {
            document.getElementById('applied-vouchers').classList.add('d-none');
            document.getElementById('voucher-code').value = '';
        }

        function removeVoucher(code) {
            appliedVouchers = appliedVouchers.filter(v => v.code !== code);
            
            // Nếu không còn voucher nào, gọi API để reset về giá gốc
            if (appliedVouchers.length === 0) {
                fetch('{{ route("voucher.remove") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        order_amount: currentSubtotal,
                        shipping_cost: 30000 // Luôn gửi giá trị gốc
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        updateOrderSummary(data.data);
                        hideAppliedVouchers();
                        showVoucherMessage('Đã xóa voucher!', 'success');
                    } else {
                        showVoucherMessage(data.message, 'danger');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showVoucherMessage('Có lỗi xảy ra khi xóa voucher!', 'danger');
                });
            } else {
                // Nếu còn voucher khác, gọi lại applyVouchers để tính toán lại
                applyVouchers();
            }
        }

        function formatCurrency(amount) {
            return new Intl.NumberFormat('vi-VN').format(amount);
        }

        function showVoucherMessage(message, type) {
            const messageDiv = document.getElementById('voucher-message');
            messageDiv.innerHTML = `<div class="alert alert-${type} alert-dismissible fade show">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>`;
            setTimeout(() => {
                messageDiv.innerHTML = '';
            }, 5000);
        }

        function loadVouchers() {
            fetch('{{ route("voucher.list") }}?order_amount=' + currentSubtotal + '&shipping_cost=' + currentShipping)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        displayVouchers(data.data);
                    }
                })
                .catch(error => {
                    console.error('Error loading vouchers:', error);
                });
        }

        function displayVouchers(vouchers) {
            const shippingContainer = document.getElementById('shipping-vouchers-list');
            const orderContainer = document.getElementById('order-vouchers-list');
            
            shippingContainer.innerHTML = '';
            orderContainer.innerHTML = '';

            if (vouchers.length === 0) {
                shippingContainer.innerHTML = '<div class="col-12"><p class="text-center text-muted">Không có voucher ship nào khả dụng</p></div>';
                orderContainer.innerHTML = '<div class="col-12"><p class="text-center text-muted">Không có voucher đơn hàng nào khả dụng</p></div>';
                return;
            }

            // Phân loại voucher
            const shippingVouchers = vouchers.filter(v => v.type === 'shipping');
            const orderVouchers = vouchers.filter(v => v.type !== 'shipping');

            // Hiển thị voucher ship
            if (shippingVouchers.length === 0) {
                shippingContainer.innerHTML = '<div class="col-12"><p class="text-center text-muted">Không có voucher ship nào khả dụng</p></div>';
            } else {
                shippingVouchers.forEach(voucher => {
                    const voucherCard = createVoucherCard(voucher);
                    shippingContainer.appendChild(voucherCard);
                });
            }

            // Hiển thị voucher đơn hàng
            if (orderVouchers.length === 0) {
                orderContainer.innerHTML = '<div class="col-12"><p class="text-center text-muted">Không có voucher đơn hàng nào khả dụng</p></div>';
            } else {
                orderVouchers.forEach(voucher => {
                    const voucherCard = createVoucherCard(voucher);
                    orderContainer.appendChild(voucherCard);
                });
            }
        }

        function createVoucherCard(voucher) {
            const col = document.createElement('div');
            col.className = 'col-md-6 mb-3';
            
            const card = document.createElement('div');
            card.className = `card h-100 voucher-card ${voucher.is_valid ? 'border-success' : 'border-secondary opacity-50'}`;
            
            const savings = voucher.is_valid ? voucher.savings : 0;
            let savingsText, savingsIcon;
            
            if (voucher.type === 'shipping') {
                savingsText = 'Miễn phí vận chuyển';
                savingsIcon = '<i class="bi bi-truck text-success"></i>';
            } else if (voucher.type === 'product') {
                if (voucher.discount_value < 100) {
                    savingsText = `Giảm ${voucher.discount_value}%`;
                    savingsIcon = '<i class="bi bi-percent text-primary"></i>';
                } else {
                    savingsText = `Giảm ${formatCurrency(voucher.discount_value)}đ`;
                    savingsIcon = '<i class="bi bi-currency-dollar text-warning"></i>';
                }
            }
            
            // Kiểm tra xem voucher đã được chọn chưa
            const isSelected = appliedVouchers.some(v => v.code === voucher.code);
            const isTypeSelected = appliedVouchers.some(v => v.type === voucher.type);
            
            let buttonText = 'Chọn';
            let buttonClass = 'btn-outline-primary';
            let buttonDisabled = false;
            
            if (isSelected) {
                buttonText = 'Đã chọn';
                buttonClass = 'btn-success';
                buttonDisabled = true;
            } else if (isTypeSelected) {
                buttonText = voucher.type === 'shipping' ? 'Đã có voucher ship' : 'Đã có voucher đơn hàng';
                buttonClass = 'btn-outline-secondary';
                buttonDisabled = true;
            }
            
            card.innerHTML = `
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h6 class="card-title mb-0">${voucher.name}</h6>
                        <span class="badge ${getVoucherBadgeClass(voucher.type)}">${voucher.type_label}</span>
                    </div>
                    <p class="card-text small text-muted">${voucher.description}</p>
                    <div class="mb-2">
                        <small class="text-muted">
                            <i class="bi bi-info-circle"></i> 
                            Đơn hàng tối thiểu: ${formatCurrency(voucher.min_order_amount)}đ
                        </small>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <strong class="text-success">${savingsIcon} ${savingsText}</strong>
                            <br>
                            <small class="text-muted">Tổng: ${formatCurrency(voucher.final_total)}đ</small>
                        </div>
                        <div>
                            <code class="small">${voucher.code}</code>
                            <button class="btn btn-sm ${buttonClass} ms-2" onclick="selectVoucher('${voucher.code}', '${voucher.type}')" ${buttonDisabled ? 'disabled' : ''}>${buttonText}</button>
                        </div>
                    </div>
                </div>
            `;
            
            col.appendChild(card);
            return col;
        }

        function getVoucherBadgeClass(type) {
            switch (type) {
                case 'product': return 'bg-primary';
                case 'shipping': return 'bg-success';
                default: return 'bg-secondary';
            }
        }

        function selectVoucher(code, type) {
            // Xóa voucher cùng loại đã chọn trước đó
            appliedVouchers = appliedVouchers.filter(v => v.type !== type);

            // Thêm voucher mới vào danh sách
            appliedVouchers.push({
                code: code,
                name: code, // Sẽ được cập nhật sau từ server
                type: type
            });

            // Cập nhật lại giao diện voucher trong modal
            loadVouchers();
        }

        // Sự kiện cho nút áp dụng voucher đã chọn
        document.addEventListener('DOMContentLoaded', function() {
            const applyBtn = document.getElementById('apply-selected-vouchers');
            if (applyBtn) {
                applyBtn.onclick = function() {
                    applyVouchers();
                    const modal = bootstrap.Modal.getInstance(document.getElementById('vouchersModal'));
                    modal.hide();
                };
            }
        });

        // Address API Integration
document.addEventListener('DOMContentLoaded', function() {
    const provinceSelect = document.getElementById('thanhPho');
    const districtSelect = document.getElementById('quanHuyen');
    const wardSelect = document.getElementById('xaPhuong');
    const provinceNameInput = document.getElementById('thanhPho_name');
    const districtNameInput = document.getElementById('quanHuyen_name');
    const wardNameInput = document.getElementById('xaPhuong_name');

    // Hàm hiển thị thông báo lỗi
    function showError(message) {
        showVoucherMessage(message, 'danger');
    }

    // Load provinces
    fetch('/provinces.php')
        .then(response => {
            if (!response.ok) throw new Error('Lỗi kết nối API tỉnh/thành');
            return response.json();
        })
        .then(data => {
            if (data.error) {
                showError('Không thể tải danh sách tỉnh/thành');
                return;
            }
            provinceSelect.innerHTML = '<option value="">Chọn Tỉnh/Thành phố</option>';
            data.forEach(province => {
                const option = document.createElement('option');
                option.value = province.code;
                option.textContent = province.name;
                option.dataset.name = province.name; // Lưu tên để dùng sau
                provinceSelect.appendChild(option);
            });
            provinceSelect.disabled = false;
        })
        .catch(error => {
            console.error('Error loading provinces:', error);
            showError('Lỗi khi tải tỉnh/thành');
        });

    // Load districts when province changes
    provinceSelect.addEventListener('change', function() {
        const provinceCode = this.value;
        const selectedOption = this.options[this.selectedIndex];
        provinceNameInput.value = provinceCode ? selectedOption.dataset.name : ''; // Lưu tên tỉnh
        districtSelect.innerHTML = '<option value="">Chọn Quận/Huyện</option>';
        wardSelect.innerHTML = '<option value="">Chọn Phường/Xã</option>';
        districtSelect.disabled = true;
        wardSelect.disabled = true;
        districtNameInput.value = ''; // Reset tên quận
        wardNameInput.value = ''; // Reset tên phường

        if (!provinceCode) return;

        fetch(`/districts.php?province_code=${provinceCode}`)
            .then(response => {
                if (!response.ok) throw new Error('Lỗi kết nối API quận/huyện');
                return response.json();
            })
            .then(data => {
                if (data.error) {
                    showError('Không thể tải danh sách quận/huyện');
                    return;
                }
                data.forEach(district => {
                    const option = document.createElement('option');
                    option.value = district.code;
                    option.textContent = district.name;
                    option.dataset.name = district.name; // Lưu tên quận
                    districtSelect.appendChild(option);
                });
                districtSelect.disabled = false;
            })
            .catch(error => {
                console.error('Error loading districts:', error);
                showError('Lỗi khi tải quận/huyện');
            });
    });

    // Load wards when district changes
    districtSelect.addEventListener('change', function() {
        const districtCode = this.value;
        const selectedOption = this.options[this.selectedIndex];
        districtNameInput.value = districtCode ? selectedOption.dataset.name : ''; // Lưu tên quận
        wardSelect.innerHTML = '<option value="">Chọn Phường/Xã</option>';
        wardSelect.disabled = true;
        wardNameInput.value = ''; // Reset tên phường

        if (!districtCode) return;

        fetch(`/wards.php?district_code=${districtCode}`)
            .then(response => {
                if (!response.ok) throw new Error('Lỗi kết nối API phường/xã');
                return response.json();
            })
            .then(data => {
                if (data.error) {
                    showError('Không thể tải danh sách phường/xã');
                    return;
                }
                data.forEach(ward => {
                    const option = document.createElement('option');
                    option.value = ward.code;
                    option.textContent = ward.name;
                    option.dataset.name = ward.name; // Lưu tên phường
                    wardSelect.appendChild(option);
                });
                wardSelect.disabled = false;
            })
            .catch(error => {
                console.error('Error loading wards:', error);
                showError('Lỗi khi tải phường/xã');
            });
    });

    // Lưu tên phường khi chọn
    wardSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        wardNameInput.value = this.value ? selectedOption.dataset.name : ''; // Lưu tên phường
    });
});
    </script>
@endpush
<style>
    /* Giới hạn chiều cao dropdown */
    .form-control[multiple], .form-control[size], select.form-control {
        max-height: 150px; /* Chiều cao tối đa của dropdown */
        overflow-y: auto; /* Thêm thanh cuộn dọc */
        -webkit-appearance: none; /* Loại bỏ style mặc định trên một số trình duyệt */
        -moz-appearance: none;
        appearance: none;
        padding-right: 1.5rem; /* Đảm bảo không che icon dropdown */
    }

    /* Tùy chỉnh thanh cuộn cho đẹp hơn */
    .form-control::-webkit-scrollbar {
        width: 8px;
    }
    .form-control::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }
    .form-control::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 4px;
    }
    .form-control::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    /* Đảm bảo dropdown vẫn hiển thị tốt trên mobile */
    @media (max-width: 576px) {
        .form-control[multiple], .form-control[size], select.form-control {
            max-height: 100px; /* Giảm chiều cao trên mobile */
        }
    }
</style>