@extends('layouts.app')
@section('title', 'eStore - Cart')

@section('content')
<main class="main">
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Cart</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li class="current">Cart</li>
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
                                    <div class="col-lg-1 text-center"><h5></h5></div>
                                    <div class="col-lg-5"><h5>Product</h5></div>
                                    <div class="col-lg-2 text-center"><h5>Price</h5></div>
                                    <div class="col-lg-2 text-center"><h5>Quantity</h5></div>
                                    <div class="col-lg-2 text-center"><h5>Total</h5></div>
                                </div>
                            </div>

                            @php $subtotal = 0; @endphp

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

                                                <div class="col-lg-5 col-10 d-flex align-items-center">
                                                    <img src="{{ $item->image_path }}" alt="Product" class="img-fluid" style="max-width: 80px;">
                                                    <div class="ms-3">
                                                        <h6 class="mb-0">{{ $item->product_name }}</h6>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2 text-center">
                                                    <span>${{ number_format($item->variant_price, 2) }}</span>
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
                                                    <span>${{ number_format($total, 2) }}</span>
                                                </div>
                                            </div>

                                            
                                            <div class="row mt-2">
                                                <div class="col-12 text-end">
                                                    <form action="{{ route('cart.remove', $item->cart_item_id) }}" method="POST" onsubmit="return confirm('Xóa sản phẩm này?');" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                            <div class="cart-actions mt-4 d-flex justify-content-between">
                                <form action="{{ route('cart.clear') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Xóa toàn bộ giỏ hàng?');">
                                        <i class="bi bi-trash"></i> Xóa toàn bộ giỏ hàng
                                    </button>
                                    
                                </form>
                                    <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="select-all">
                                    <label for="select-all" class="form-check-label">Chọn tất cả</label>
                                    </div>

                            </div>
                        </div>
                    
                </div>

                <div class="col-lg-4">
                    <div class="cart-summary border p-3">
                        <h4 class="summary-title mb-3">Order Summary</h4>
                        <div class="summary-item d-flex justify-content-between">
                            <span class="summary-label">Tổng toàn bộ</span>
                            <span class="summary-value">${{ number_format($subtotal, 2) }}</span>
                        </div>

                        <form id="checkout-form" action="{{ route('checkout') }}" method="POST">
                            @csrf
                            <input type="hidden" name="selected_items" id="selected_items_checkout">
                            <div class="summary-item d-flex justify-content-between mt-2">
                                <span class="summary-label">Tổng tiền đã chọn</span>
                                <span class="summary-value" id="selected-total">$0.00</span>
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

   function calculateSelectedTotal() {
    let total = 0;
    let selectedIds = [];

    checkboxes.forEach(chk => {
        if (chk.checked) {
            const row = chk.closest('.cart-item');
            const priceText = row.querySelector('div.col-lg-2.text-center span').innerText;
            const price = parseFloat(priceText.replace('$', ''));

            const quantityInput = row.querySelector('input[type="number"]');
            const quantity = parseInt(quantityInput.value);

            total += price * quantity;
            selectedIds.push(chk.value);
        }
    });

    selectedItemsInput.value = selectedIds.join(',');
    selectedTotal.textContent = `$${total.toFixed(2)}`;
    checkoutButton.disabled = selectedIds.length === 0;
}


    checkboxes.forEach(chk => {
        chk.addEventListener('change', calculateSelectedTotal);
    });

    checkoutForm.addEventListener('submit', function (e) {
        if (!selectedItemsInput.value) {
            e.preventDefault();
            alert("Vui lòng chọn ít nhất một sản phẩm để thanh toán.");
        }
    });

   document.querySelectorAll('.quantity-input').forEach(input => {
    input.addEventListener('input', function () {
        const max = parseInt(this.dataset.stock);
        const val = parseInt(this.value);

        if (val > max) {
            alert(`Số lượng vượt quá số lượng trong kho (${max}).`);
            this.value = max;
        }

        calculateSelectedTotal();
    });
});

});
document.addEventListener('DOMContentLoaded', function () {
    const selectAllCheckbox = document.getElementById('select-all');
    const checkboxes = document.querySelectorAll('input[name="selected_items[]"]');
    const checkoutButton = document.getElementById('checkout-button');
    const selectedItemsInput = document.getElementById('selected_items_checkout');
    const selectedTotal = document.getElementById('selected-total');

    function calculateSelectedTotal() {
        let total = 0;
        let selectedIds = [];

        checkboxes.forEach(chk => {
            if (chk.checked) {
                const row = chk.closest('.cart-item');
                const priceText = row.querySelector('div.col-lg-2.text-center span').innerText;
                const price = parseFloat(priceText.replace('$', ''));

                const quantityInput = row.querySelector('input[type="number"]');
                const quantity = parseInt(quantityInput.value);

                total += price * quantity;
                selectedIds.push(chk.value);
            }
        });

        selectedItemsInput.value = selectedIds.join(',');
        selectedTotal.textContent = `$${total.toFixed(2)}`;
        checkoutButton.disabled = selectedIds.length === 0;
    }

    checkboxes.forEach(chk => {
        chk.addEventListener('change', function () {
            calculateSelectedTotal();

            // Nếu có checkbox nào chưa check thì bỏ chọn tất cả
            if (!this.checked) {
                selectAllCheckbox.checked = false;
            } else {
                // Nếu tất cả checkbox đều được chọn thì check "select all"
                const allChecked = Array.from(checkboxes).every(chk => chk.checked);
                selectAllCheckbox.checked = allChecked;
            }
        });
    });

    selectAllCheckbox.addEventListener('change', function () {
        checkboxes.forEach(chk => {
            chk.checked = this.checked;
        });
        calculateSelectedTotal();
    });

    // Các event khác như kiểm tra số lượng vẫn giữ nguyên...
});

</script>
@endsection
