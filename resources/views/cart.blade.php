@extends('layouts.app')
@section('title', 'eStore - Cart')

@section('content')
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<main class="main">
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Giỏ hàng</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li class="current">Giỏ hàng</li>
                </ol>
            </nav>
        </div>
    </div>

    <section id="cart" class="cart section">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="cart-items">
                        <div class="cart-header d-none d-lg-block">
                            <div class="row align-items-center gy-4">
                                <div class="col-lg-2 text-center"><h5></h5></div>
                                {{-- <div class="col-lg-2"><h5>Hình ảnh</h5></div> --}}
                                <div class="col-lg-3"><h5>Sản phẩm</h5></div>
                                <div class="col-lg-2 text-center"><h5>Giá</h5></div>
                                <div class="col-lg-2 text-center"><h5>Số lượng</h5></div>
                                <div class="col-lg-2 text-center"><h5>Tổng</h5></div>
                            </div>
                        </div>

                        @php $subtotal = 0; @endphp

                        @if(Auth::check())
                            @foreach ($cartItems as $item)
                                @php
                                    $total = $item->variant_price * $item->quantity;
                                    $subtotal += $total;
                                @endphp

                                <div class="cart-item mb-3 border p-3">
                                    <div class="row align-items-center gy-4">
                                        <div class="col-lg-1 col-2 text-center">
                                            <input type="checkbox"
                                                name="selected_items[]"
                                                value="{{ $item->cart_item_id }}"
                                                class="form-check-input">
                                        </div>

                                        <div class="col-lg-4 col-10 d-flex align-items-center">
                                            <img src="{{asset('storage/'.$item->image_path )}}" alt="Product" class="img-fluid" style="max-width: 80px;">
                                            <div class="ms-3">
                                                <h6 class="mb-0" style="font-size: 0.8rem;">{{ $item->product_name }}</h6>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 text-center">
                                            <span style="font-size: 0.8rem;">{{ number_format($item->variant_price, 0) }}vnđ</span>
                                        </div>

                                        <div class="col-lg-2 text-center">
                                            <input type="number" 
                                                name="cart_items[{{ $item->cart_item_id }}]" 
                                                value="{{ $item->quantity }}" 
                                                min="1" 
                                                max="{{ $item->max_quantity }}" 
                                                class="form-control text-center quantity-input"
                                                data-stock="{{ $item->max_quantity }}">
                                        </div>

                                        <div class="col-lg-2 text-center">
                                            <span style="font-size: 0.8rem;">{{ number_format($total, 0) }}vnđ</span>
                                        </div>
                                        <div class="col-lg-1 text-center">
                                            <form action="{{ route('cart.remove', $item->cart_item_id) }}" method="POST" onsubmit="return confirm('Xóa sản phẩm này?');" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="background-color: transparent; border: none;"><i class="bi bi-trash3"></i></button>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="row mt-2">
                                        <div class="col-12 text-end">
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            @foreach ($cartItems as $variantId => $item)
                                @php
                                    $total = $item['price'] * $item['quantity'];
                                    $subtotal += $total;
                                @endphp

                                <div class="cart-item mb-3 border p-3">
                                    <div class="row align-items-center gy-4">
                                        <div class="col-lg-1 col-2 text-center">
                                            <input type="checkbox"
                                                name="selected_items[]"
                                                value="{{ $variantId }}"
                                                class="form-check-input">
                                        </div>

                                        <div class="col-lg-5 col-10 d-flex align-items-center">
                                            {{-- Không có ảnh trong session thì gán mặc định --}}
                                            <img src="{{ asset('assets/img/product/default.webp') }}" alt="Product" class="img-fluid" style="max-width: 80px;">
                                            <div class="ms-3">
                                                <h6 class="mb-0">{{ $item['product_name'] }}</h6>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 text-center">
                                            <span>{{ number_format($item['price'], 0) }}vnđ</span>
                                        </div>

                                        <div class="col-lg-2 text-center">
                                            <input type="number" 
                                                name="cart_items[{{ $variantId }}]" 
                                                value="{{ $item['quantity'] }}" 
                                                min="1" 
                                                max="{{ $item['stock_quantity'] ?? 100 }}" 
                                                class="form-control text-center quantity-input"
                                                data-stock="{{ $item['stock_quantity'] ?? 100 }}">
                                        </div>

                                        <div class="col-lg-2 text-center">
                                            <span>{{ number_format($total, 0) }}vnđ</span>
                                        </div>
                                    </div>

                                    {{-- Nút xóa sản phẩm trong session --}}
                                    <div class="row mt-2">
                                        <div class="col-12 text-end">
                                            <form action="{{ route('cart.removeSession', $variantId) }}" method="POST" onsubmit="return confirm('Xóa sản phẩm này?');" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <div class="cart-actions mt-4 d-flex justify-content-between">
                            <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="select-all">
                                    <label for="select-all" class="form-check-label">Chọn tất cả</label>
                            </div>
                            <div class="d-flex gap-2">
                                <form action="{{ route('cart.update') }}" method="POST" id="update-cart-form">
                                    @csrf
                                    <!-- Thêm các input fields cho số lượng -->
                                    @if(Auth::check())
                                        @foreach ($cartItems as $item)
                                            <input type="hidden" name="cart_items[{{ $item->cart_item_id }}]" value="{{ $item->quantity }}" class="quantity-hidden-input" data-cart-item-id="{{ $item->cart_item_id }}">
                                        @endforeach
                                    @else
                                        @foreach ($cartItems as $variantId => $item)
                                            <input type="hidden" name="cart_items[{{ $variantId }}]" value="{{ $item['quantity'] }}" class="quantity-hidden-input" data-variant-id="{{ $variantId }}">
                                        @endforeach
                                    @endif
                                    <button type="submit" class="btn btn-outline-primary" id="update-cart-btn">
                                        <i class="bi bi-arrow-clockwise"></i> Cập nhật giỏ hàng
                                    </button>
                                </form>
                                
                                <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Xóa toàn bộ giỏ hàng?');">
                                    <i class="bi bi-trash"></i> Xóa toàn bộ giỏ hàng
                                </button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="cart-summary border p-3">
                        <h4 class="summary-title mb-3">Tóm tắt đơn hàng</h4>
                        <div class="summary-item d-flex justify-content-between">
                            <span class="summary-label">Tổng toàn bộ</span>
                            <span class="summary-value">{{ number_format($subtotal, 0) }}vnđ</span>
                        </div>

                        <form id="checkout-form" action="{{ route('checkout') }}" method="POST">
                            @csrf
                            <input type="hidden" name="selected_items" id="selected_items_checkout">
                            <div class="summary-item d-flex justify-content-between mt-2">
                                <span class="summary-label">Tổng tiền đã chọn</span>
                                <span class="summary-value" id="selected-total">0vnđ</span>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3 w-100" id="checkout-button" disabled>Đặt hàng</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

{{-- SCRIPT --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('input[name="selected_items[]"]');
    const checkoutButton = document.getElementById('checkout-button');
    const selectedItemsInput = document.getElementById('selected_items_checkout');
    const checkoutForm = document.getElementById('checkout-form');
    const selectedTotal = document.getElementById('selected-total');
    const selectAllCheckbox = document.getElementById('select-all');

    function calculateSelectedTotal() {
        let total = 0;
        let selectedIds = [];

        checkboxes.forEach(chk => {
            if (chk.checked) {
                const row = chk.closest('.cart-item');
                const priceText = row.querySelector('div.col-lg-2.text-center span').innerText;
                const cleanedPriceText = priceText.replace(/[^\d.,]/g, '');
                const price = parseFloat(cleanedPriceText.replace(/,/g, ''));

                const quantityInput = row.querySelector('input[type="number"]');
                const quantity = parseInt(quantityInput.value) || 0;

                total += price * quantity;
                selectedIds.push(chk.value);
            }
        });

        selectedItemsInput.value = selectedIds.join(',');
        selectedTotal.textContent = total.toLocaleString('vi-VN', { minimumFractionDigits: 0 }) + 'vnđ';
        checkoutButton.disabled = selectedIds.length === 0;
    }

    // Cập nhật tổng tiền khi thay đổi số lượng
    function updateTotalPrice() {
        let total = 0;
        document.querySelectorAll('.cart-item').forEach(item => {
            const priceText = item.querySelector('div.col-lg-2.text-center span').innerText;
            const cleanedPriceText = priceText.replace(/[^\d.,]/g, '');
            const price = parseFloat(cleanedPriceText.replace(/,/g, ''));

            const quantityInput = item.querySelector('input[type="number"]');
            const quantity = parseInt(quantityInput.value) || 0;

            total += price * quantity;
        });

        // Cập nhật hiển thị tổng tiền
        const totalDisplay = document.querySelector('.summary-value');
        if (totalDisplay) {
            totalDisplay.textContent = total.toLocaleString('vi-VN', { minimumFractionDigits: 0 }) + 'vnđ';
        }
    }

    // Sự kiện chọn từng checkbox
    checkboxes.forEach(chk => {
        chk.addEventListener('change', function () {
            calculateSelectedTotal();

            if (!this.checked) {
                selectAllCheckbox.checked = false;
            } else {
                const allChecked = Array.from(checkboxes).every(chk => chk.checked);
                selectAllCheckbox.checked = allChecked;
            }
        });
    });

    // Sự kiện chọn tất cả
    selectAllCheckbox.addEventListener('change', function () {
        checkboxes.forEach(chk => {
            chk.checked = this.checked;
        });
        calculateSelectedTotal();
    });

    // Kiểm tra số lượng hợp lệ
    document.querySelectorAll('.quantity-input').forEach(input => {
    // Lưu giá trị ban đầu vào attribute data-prev
    input.setAttribute('data-prev', input.value);

    input.addEventListener('input', function () {
        const max = parseInt(this.dataset.stock);
        let val = parseInt(this.value);

        if (val > max) {
            alert(`Số lượng vượt quá số lượng trong kho (${max}).`);
            // Trả về giá trị trước đó (không tăng)
            this.value = this.getAttribute('data-prev');
        } else if (val < 1 || isNaN(val)) {
            // Không cho nhập số nhỏ hơn 1 hoặc không phải số
            this.value = this.getAttribute('data-prev');
        } else {
            // Cập nhật giá trị mới hợp lệ
            this.setAttribute('data-prev', val);
        }

        // Cập nhật hidden input tương ứng
        updateHiddenInput(this);

        calculateSelectedTotal();
        updateTotalPrice(); // Cập nhật tổng tiền khi thay đổi số lượng
    });

    // Tự động update cart khi thay đổi số lượng (với debounce)
    let updateTimeout;
    input.addEventListener('change', function() {
        clearTimeout(updateTimeout);
        updateTimeout = setTimeout(() => {
            // Chỉ update nếu giá trị thực sự thay đổi
            if (this.value !== this.getAttribute('data-prev')) {
                updateCart();
            }
        }, 1000); // Delay 1 giây sau khi user ngừng nhập
    });
});

    // Function để cập nhật hidden input
    function updateHiddenInput(quantityInput) {
        const cartItem = quantityInput.closest('.cart-item');
        const checkbox = cartItem.querySelector('input[name="selected_items[]"]');
        
        if (checkbox) {
            const itemId = checkbox.value;
            const hiddenInput = document.querySelector(`.quantity-hidden-input[data-cart-item-id="${itemId}"], .quantity-hidden-input[data-variant-id="${itemId}"]`);
            
            if (hiddenInput) {
                hiddenInput.value = quantityInput.value;
            }
        }
    }

    // Function để update cart
    function updateCart() {
        // Cập nhật tất cả hidden inputs trước khi submit
        document.querySelectorAll('.quantity-input').forEach(input => {
            updateHiddenInput(input);
        });

        const form = document.getElementById('update-cart-form');
        const submitBtn = document.getElementById('update-cart-btn');
        
        // Disable button để tránh spam
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="bi bi-arrow-clockwise"></i> Đang cập nhật...';
        
        // Submit form
        form.submit();
    }


    // Kiểm tra khi submit
    checkoutForm.addEventListener('submit', function (e) {
        if (!selectedItemsInput.value) {
            e.preventDefault();
            alert("Vui lòng chọn ít nhất một sản phẩm để thanh toán.");
        }
    });
});
</script>

@endsection
