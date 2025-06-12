@extends('layouts.app')
@section('title', 'eStore - Cart')

@section('content')
<main class="main">
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Cart</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Cart</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Cart Section -->
    <section id="cart" class="cart section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-4">
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <form id="cart-form">
                        @csrf
                        <div class="cart-items">
                            <div class="cart-header d-none d-lg-block">
                                <div class="row align-items-center gy-4">
                                    <div class="col-lg-6"><h5>Product</h5></div>
                                    <div class="col-lg-2 text-center"><h5>Price</h5></div>
                                    <div class="col-lg-2 text-center"><h5>Quantity</h5></div>
                                    <div class="col-lg-2 text-center"><h5>Total</h5></div>
                                </div>
                            </div>

                            @foreach ($cartItems as $item)
                            <div class="cart-item" data-item-id="{{ $item->cart_item_id }}">
                                <div class="row align-items-center gy-4">
                                    <div class="col-lg-6 col-12 mb-3 mb-lg-0">
                                        <div class="product-info d-flex align-items-center">
                                            <div class="product-image">
                                                <img src="{{ $item->image_path }}" alt="Product" class="img-fluid" loading="lazy">
                                            </div>
                                            <div class="product-details">
                                                <h6 class="product-title">{{ $item->product_name }}</h6>
                                                <button class="remove-item" type="button" data-item-id="{{ $item->cart_item_id }}">
                                                    <i class="bi bi-trash"></i> Remove
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-2 text-center">
                                        <div class="price-tag">
                                            <span class="current-price">${{ $item->variant_price }}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-2 text-center">
                                        <div class="quantity-selector">
                                            <button type="button" class="quantity-btn decrease">
                                                <i class="bi bi-dash"></i>
                                            </button>
                                            <input type="number" 
                                                   class="quantity-input" 
                                                   name="cart_items[{{ $item->cart_item_id }}]"
                                                   value="{{ $item->quantity }}" 
                                                   min="1" 
                                                   max="10"
                                                   data-price="{{ $item->variant_price }}">
                                            <button type="button" class="quantity-btn increase">
                                                <i class="bi bi-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-2 text-center mt-3 mt-lg-0">
                                        <div class="item-total">
                                            <span class="total-price">${{ $item->variant_price * $item->quantity }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="cart-actions">
                                <div class="row g-3">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="coupon-form">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Coupon code">
                                                <button class="btn btn-accent" type="button">Apply</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 text-md-end">
                                        <button type="button" class="btn btn-outline-accent me-2" id="update-cart">
                                            <i class="bi bi-arrow-clockwise"></i> Update
                                        </button>
                                        <button type="button" class="btn btn-outline-danger" id="clear-cart">
                                            <i class="bi bi-trash"></i> Clear
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <!-- Order Summary section remains the same -->
                    <div class="cart-summary">
                        <h4 class="summary-title">Order Summary</h4>
                        <div class="summary-item">
                            <span class="summary-label">Subtotal</span>
                            <span class="summary-value" id="subtotal">$0.00</span>
                        </div>
                          <button class="btn btn-primary" id="checkout">Đặt hàng</button>
                    </div>
                  
                </div>
            </div>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Update cart functionality
    document.getElementById('update-cart').addEventListener('click', function() {
        const formData = new FormData(document.getElementById('cart-form'));
        
        fetch('{{ route("cart.update") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                location.reload();
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while updating the cart.');
        });
    });

    // Clear cart functionality
    document.getElementById('clear-cart').addEventListener('click', function() {
        if (confirm('Are you sure you want to clear your cart?')) {
            fetch('{{ route("cart.clear") }}', {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    location.reload();
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while clearing the cart.');
            });
        }
    });

    // Remove individual item
    document.querySelectorAll('.remove-item').forEach(button => {
        button.addEventListener('click', function() {
            const itemId = this.getAttribute('data-item-id');
            
            if (confirm('Are you sure you want to remove this item?')) {
                fetch(`{{ url('cart/remove') }}/${itemId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.querySelector(`[data-item-id="${itemId}"]`).remove();
                        alert(data.message);
                    } else {
                        alert('Error: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while removing the item.');
                });
            }
        });
    });

    // Quantity increase/decrease buttons
    document.querySelectorAll('.quantity-btn').forEach(button => {
        button.addEventListener('click', function() {
            const input = this.parentElement.querySelector('.quantity-input');
            const isIncrease = this.classList.contains('increase');
            let currentValue = parseInt(input.value);
            
            if (isIncrease && currentValue < 10) {
                input.value = currentValue + 1;
            } else if (!isIncrease && currentValue > 1) {
                input.value = currentValue - 1;
            }
            
            // Update total price for this item
            updateItemTotal(input);
        });
    });

    // Update item total when quantity changes
    function updateItemTotal(input) {
        const price = parseFloat(input.getAttribute('data-price'));
        const quantity = parseInt(input.value);
        const total = price * quantity;
        
        const totalElement = input.closest('.cart-item').querySelector('.total-price');
        totalElement.textContent = '$' + total.toFixed(2);
        
        updateSubtotal();
    }

    // Update subtotal
    function updateSubtotal() {
        let subtotal = 0;
        document.querySelectorAll('.total-price').forEach(element => {
            subtotal += parseFloat(element.textContent.replace('$', ''));
        });
        
        document.getElementById('subtotal').textContent = '$' + subtotal.toFixed(2);
    }

    // Initialize subtotal calculation
    updateSubtotal();
});
</script>
@endsection
