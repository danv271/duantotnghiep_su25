<?php

use App\Http\Controllers\ProductController;
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
    return view('product-detail');
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


Route::prefix('admin/products')->group(function () {
    // Danh sách sản phẩm
    Route::get('/list',[ProductController::class,'index'])->name('admin.products-list');

    // Tạo sản phẩm
    Route::get('/create',[ProductController::class,'create'])->name('admin.products-create');
    Route::post('/store',[ProductController::class,'store'])->name('admin.products-store');

    // Chỉnh sửa sản phẩm
    Route::get('/edit/{id}',[ProductController::class,'edit'])->name('admin.products-edit');
    Route::put('/update/{id}',[ProductController::class,'update'])->name('admin.products-update'); // Thêm route PUT để cập nhật

    // Chi tiết sản phẩm
    Route::get('/detail/{id}',[ProductController::class,'show'])->name('admin.products-detail');

});
Route::get('/admin/category', function () {
    return view('admin.category.index');
})->name('admin.category.index');

Route::get('/admin/category/create', function () {
    return view('admin.category.create');
})->name('admin.category.create');

Route::get('/admin/category/edit', function () {
    return view('admin.category.edit');
})->name('admin.category.edit');


Route::get('/admin/attributes', function () {
    return view('admin.attributes.index');
})->name('admin.attributes.index');
Route::get('/admin/attributes/create', function () {
    return view('admin.attributes.create');
})->name('admin.attributes.create');
Route::get('/admin/attributes/edit', function () {
    return view('admin.attributes.edit');
})->name('admin.attributes.edit');


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/roles', function () {
        return view('admin.roles.index');
    })->name('roles.index');

    Route::get('/roles/create', function () {
        return view('admin.roles.create');
    })->name('roles.create');

    Route::get('/roles/{id}', function ($id) {
        return view('admin.roles.show', ['id' => $id]);
    })->name('roles.show');

    Route::get('/roles/{id}/edit', function ($id) {
        return view('admin.roles.edit', ['id' => $id]);
    })->name('roles.edit');
});

