<?php

use App\Http\Controllers\Admin\OrderController;
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
    Route::get('/list', function () {
        return view('admin.products.list');
    })->name('admin.products-list');

    // Tạo sản phẩm
    Route::get('/create',function(){
        $categories = [
            (object) ['category_id' => 1, 'description' => 'Fashion', 'parent_category_id' => null, 'status' => 'active'],
            (object) ['category_id' => 2, 'description' => 'Electronics', 'parent_category_id' => null, 'status' => 'active'],
            (object) ['category_id' => 3, 'description' => 'Footwear', 'parent_category_id' => 1, 'status' => 'active'],
            (object) ['category_id' => 4, 'description' => 'Smartphones', 'parent_category_id' => 2, 'status' => 'active'],
            (object) ['category_id' => 5, 'description' => 'Watches', 'parent_category_id' => 1, 'status' => 'active'],
        ];

        // Demo data for attributes
        $attributes = [
            (object) ['attribute_id' => 1, 'name' => 'Color'],
            (object) ['attribute_id' => 2, 'name' => 'Size'],
            (object) ['attribute_id' => 3, 'name' => 'Material'],
            (object) ['attribute_id' => 4, 'name' => 'Brand'],
        ];

        // Demo data for attribute values
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
        return view('admin.products.create',compact('categories', 'attributes', 'attributeValues'));
    })->name('admin.products-create');
    Route::post('/store', function () {

    })->name('admin.products-store');

    // Chỉnh sửa sản phẩm
    Route::get('/id/edit',function(){
        return view('admin.products.edit');
    })->name('admin.products-edit');
    Route::put('/{id}',function(){

    })->name('admin.products-update'); // Thêm route PUT để cập nhật

    // Chi tiết sản phẩm
    Route::get('/id',function(){
        return view('admin.products.detail');
    })->name('admin.products-detail');

    // Upload file (dùng POST thay vì GET)
    Route::post('/upload-file', function () {
        // Xử lý upload file
    })->name('admin.products.upload-file');
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


Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
Route::get('/admin/orders/{id}', [OrderController::class, 'show'])->name('admin.orders.show');
Route::get('/admin/orders/{id}/edit', [OrderController::class, 'edit'])->name('admin.orders.edit');
Route::put('admin/orders/{id}', [OrderController::class, 'update'])->name('admin.orders.update');
Route::delete('/admin/orders/{id}/destroy', [OrderController::class, 'destroy'])->name('admin.orders.destroy');

