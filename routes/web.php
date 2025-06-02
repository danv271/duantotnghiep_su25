<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AttributeController;

// Frontend routes
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

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Attributes controller
    Route::controller(AttributeController::class)->group(function () {
        Route::get('/attributes', 'index')->name('attributes.index');
        Route::get('/attributes/create', 'create')->name('attributes.create');
        Route::post('/attributes', 'store')->name('attributes.store');
        Route::get('/attributes/{id}/edit', 'edit')->name('attributes.edit');
        Route::put('/attributes/{id}', 'update')->name('attributes.update');
        Route::delete('/attributes/{id}', 'destroy')->name('attributes.destroy');
    });

    // Products routes
    Route::prefix('products')->group(function () {
        Route::get('/list', function () {
            return view('admin.products.list');
        })->name('products-list');
        // ... other product routes ...
    });

    // Category routes
    Route::get('/category', function () {
        return view('admin.category.index');
    })->name('category.index');
    Route::get('/category/create', function () {
        return view('admin.category.create');
    })->name('category.create');
    Route::get('/category/edit', function () {
        return view('admin.category.edit');
    })->name('category.edit');

    // Roles routes
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

