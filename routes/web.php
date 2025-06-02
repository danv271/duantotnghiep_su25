<?php

use Illuminate\Support\Facades\Route;

// =================== Giao diện người dùng ===================
Route::get('/', fn () => view('index'));

Route::get('/account', fn () => view('account'))->name('account');

Route::get('/checkout', fn () => view('checkout'))->name('checkout');
Route::post('/checkout', fn () => view('checkout'))->name('checkout.process');

Route::get('/login', fn () => view('auth.login-register'))->name('login');
Route::get('/register', fn () => view('auth.login-register'))->name('register');

Route::view('/cart', 'cart')->name('cart');

Route::get('/search', fn () => view('search'))->name('search');

Route::get('/product-details', fn () => view('product-detail'))->name('product-detail');

Route::get('/category', fn () => view('category'))->name('category');

// =================== Quản trị admin ===================
Route::get('/admin/dashboard', fn () => view('admin.dashboard'))->name('admin.dashboard');

// ------------------- Product -------------------
Route::prefix('admin/products')->group(function () {
    Route::get('/list', fn () => view('admin.products.list'))->name('admin.products-list');

    Route::get('/create', function () {
        $categories = [
            (object) ['category_id' => 1, 'description' => 'Fashion', 'parent_category_id' => null, 'status' => 'active'],
            (object) ['category_id' => 2, 'description' => 'Electronics', 'parent_category_id' => null, 'status' => 'active'],
            (object) ['category_id' => 3, 'description' => 'Footwear', 'parent_category_id' => 1, 'status' => 'active'],
            (object) ['category_id' => 4, 'description' => 'Smartphones', 'parent_category_id' => 2, 'status' => 'active'],
            (object) ['category_id' => 5, 'description' => 'Watches', 'parent_category_id' => 1, 'status' => 'active'],
        ];

        $attributes = [
            (object) ['attribute_id' => 1, 'name' => 'Color'],
            (object) ['attribute_id' => 2, 'name' => 'Size'],
            (object) ['attribute_id' => 3, 'name' => 'Material'],
            (object) ['attribute_id' => 4, 'name' => 'Brand'],
        ];

        $attributeValues = [
            (object) ['attribute_value_id' => 1, 'value' => 'Red'],
            (object) ['attribute_value_id' => 2, 'value' => 'Blue'],
            (object) ['attribute_value_id' => 3, 'value' => 'Green'],
            (object) ['attribute_value_id' => 4, 'value' => 'XS'],
            (object) ['attribute_value_id' => 5, 'value' => 'S'],
            (object) ['attribute_value_id' => 6, 'value' => 'M'],
            (object) ['attribute_value_id' => 7, 'value' => 'L'],
            (object) ['attribute_value_id' => 8, 'value' => 'Cotton'],
            (object) ['attribute_value_id' => 9, 'value' => 'Leather'],
            (object) ['attribute_value_id' => 10, 'value' => 'Polyester'],
            (object) ['attribute_value_id' => 11, 'value' => 'Nike'],
            (object) ['attribute_value_id' => 12, 'value' => 'Adidas'],
            (object) ['attribute_value_id' => 13, 'value' => 'Samsung'],
        ];

        return view('admin.products.create', compact('categories', 'attributes', 'attributeValues'));
    })->name('admin.products-create');

    Route::post('/store', fn () => 'Store logic here')->name('admin.products-store');

    Route::get('/{id}/edit', fn ($id) => view('admin.products.edit'))->name('admin.products-edit');
    Route::put('/{id}', fn ($id) => 'Update logic here')->name('admin.products-update');

    Route::get('/{id}', fn ($id) => view('admin.products.detail'))->name('admin.products-detail');

    Route::post('/upload-file', fn () => 'File upload logic')->name('admin.products.upload-file');
});

// ------------------- Category -------------------
Route::prefix('admin/category')->name('admin.category.')->group(function () {
    Route::get('/', fn () => view('admin.category.index'))->name('index');
    Route::get('/create', fn () => view('admin.category.create'))->name('create');
    Route::get('/edit', fn () => view('admin.category.edit'))->name('edit');
});

// ------------------- Attributes -------------------
Route::prefix('admin/attributes')->name('admin.attributes.')->group(function () {
    Route::get('/', fn () => view('admin.attributes.index'))->name('index');
    Route::get('/create', fn () => view('admin.attributes.create'))->name('create');
    Route::get('/edit', fn () => view('admin.attributes.edit'))->name('edit');
});

// ------------------- Roles -------------------
Route::prefix('admin/roles')->name('admin.roles.')->group(function () {
    Route::get('/', fn () => view('admin.roles.index'))->name('index');
    Route::get('/create', fn () => view('admin.roles.create'))->name('create');
    Route::get('/{id}', fn ($id) => view('admin.roles.show', ['id' => $id]))->name('show');
    Route::get('/{id}/edit', fn ($id) => view('admin.roles.edit', ['id' => $id]))->name('edit');
});

// ------------------- Admin layout pages -------------------
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', fn () => view('admin.dashboard'))->name('dashboard');
    Route::get('/products', fn () => view('admin.products'))->name('products');
});
