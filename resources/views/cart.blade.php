@extends('layouts.app') {{-- Sử dụng layout chung --}}

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">🛒 Giỏ hàng</h2>

    <table class="table table-bordered text-center align-middle">
        <thead class="table-light">
            <tr>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < 3; $i++)
                @include('partials.cart-item')
            @endfor
        </tbody>
    </table>

    <div class="text-end mt-4">
        <h4>Tổng tiền: <span class="text-danger">45.000.000 đ</span></h4>
        <a href="{{ url('/checkout') }}" class="btn btn-success mt-3">Thanh toán</a>
    </div>
</div>
@endsection
