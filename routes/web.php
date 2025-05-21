<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('client.index');
});
Route::get('/checkout', function () {
    return view('client.checkout');
})->name('checkout');
Route::post('/checkout', function () {
    return view('client.checkout');
})->name('checkout.process');
Route::view('/cart', 'client.cart'); // Trang giỏ hàng hiển thị HTML
Route::get('/product-detail', function () {
    return view('client.product-detail');
})->name('product-detail');
Route::get('/category', function () {
    return view('client.category');
})->name('category');
