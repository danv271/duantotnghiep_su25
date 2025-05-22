<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');
Route::post('/checkout', function () {
    return view('checkout');
})->name('checkout.process');
Route::view('/cart', 'cart'); // Trang giỏ hàng hiển thị HTML
Route::get('/product-detail', function () {
    return view('product-detail');
})->name('product-detail');
Route::get('/category', function () {
    return view('category');
})->name('category');
