<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/account', function () {
    return view('account');
})->name('account');
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');
Route::post('/checkout', function () {
    return view('checkout');
})->name('checkout.process');

Route::get('/login', function () {
    return view('auth.login-register');
})->name('login');
Route::get('/register', function () {
    return view('auth.login-register');
})->name('register');

Route::view('/cart', 'cart'); // Trang giỏ hàng hiển thị HTML

Route::get('/search', function () {
    return view('search');
})->name('search');

Route::get('/product-details', function () {
    return view('product-details');
})->name('product-detail');// Trang chi tiết sản phẩm hiển thị HTML

Route::get('/category', function () {
    return view('category');
})->name('category');

Route::get('/product-details', function () {
    return view('product-details');
})->name('product-details');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/products/add', function () {
    return view('admin.products.add');
})->name('admin.products.add');

Route::get('/admin/products/detail', function () {
    return view('admin.products.detail');
})->name('admin.products.detail');

Route::get('/admin/products/edit', function () {
    return view('admin.products.edit');
})->name('admin.products.edit');

Route::get('/admin/products/grid', function () {
    return view('admin.products.grid');
})->name('admin.products.grid');

Route::get('/admin/products/list', function () {
    return view('admin.products.list');
})->name('admin.products.list');
