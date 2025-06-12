<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Đây là nơi định nghĩa tất cả route cho web. 
| Các route người dùng và quản trị được tách riêng gọn gàng.
*/
Route::get('/test-cart', function() {
    $cart = [
        '1' => [
            'id' => '1',
            'name' => 'Test Product',
            'price' => 100000,
            'quantity' => 2,
            'image' => 'images/default-product.jpg',
            'color' => 'Red',
            'size' => 'L'
        ]
    ];
    
    session()->put('cart', $cart);
    return redirect()->route('cart.index');
});

// ===================== Giao diện người dùng =====================
Route::view('/', 'index');
Route::view('/account', 'account')->name('account');
Route::view('/checkout', 'checkout')->name('checkout');
Route::post('/checkout', fn () => view('checkout'))->name('checkout.process');
Route::view('/login', 'auth.login-register')->name('login');
Route::view('/register', 'auth.login-register')->name('register');

// ===================== Cart Routes =====================
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/update', [CartController::class, 'update'])->name('update');
    Route::delete('/clear', [CartController::class, 'clear'])->name('clear');
    Route::delete('/remove/{id}', [CartController::class, 'remove'])->name('remove');
});


Route::view('/search', 'search')->name('search');
Route::view('/product-detail', 'product-detail')->name('product-detail');
Route::view('/product-details', 'product-details')->name('product-details');
Route::view('/category', 'category')->name('category');

// ===================== Trang quản trị (admin) =====================
Route::prefix('admin')->name('admin.')->group(function () {

     Route::view('/', '/admin/dashboard');

    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

    // --------- Quản lý sản phẩm ---------
    Route::prefix('products')->name('products.')->group(function () {
        Route::view('/list', 'admin.products.list')->name('list');

        Route::get('/create', function () {
            $categories = [
                (object)['category_id' => 1, 'description' => 'Fashion', 'parent_category_id' => null, 'status' => 'active'],
                (object)['category_id' => 2, 'description' => 'Electronics', 'parent_category_id' => null, 'status' => 'active'],
                (object)['category_id' => 3, 'description' => 'Footwear', 'parent_category_id' => 1, 'status' => 'active'],
                (object)['category_id' => 4, 'description' => 'Smartphones', 'parent_category_id' => 2, 'status' => 'active'],
                (object)['category_id' => 5, 'description' => 'Watches', 'parent_category_id' => 1, 'status' => 'active'],
            ];

            $attributes = [
                (object)['attribute_id' => 1, 'name' => 'Color'],
                (object)['attribute_id' => 2, 'name' => 'Size'],
                (object)['attribute_id' => 3, 'name' => 'Material'],
                (object)['attribute_id' => 4, 'name' => 'Brand'],
            ];

            $attributeValues = [
                (object)['attribute_value_id' => 1, 'value' => 'Red'],
                (object)['attribute_value_id' => 2, 'value' => 'Blue'],
                (object)['attribute_value_id' => 3, 'value' => 'Green'],
                (object)['attribute_value_id' => 4, 'value' => 'XS'],
                (object)['attribute_value_id' => 5, 'value' => 'S'],
                (object)['attribute_value_id' => 6, 'value' => 'M'],
                (object)['attribute_value_id' => 7, 'value' => 'L'],
                (object)['attribute_value_id' => 8, 'value' => 'Cotton'],
                (object)['attribute_value_id' => 9, 'value' => 'Leather'],
                (object)['attribute_value_id' => 10, 'value' => 'Polyester'],
                (object)['attribute_value_id' => 11, 'value' => 'Nike'],
                (object)['attribute_value_id' => 12, 'value' => 'Adidas'],
                (object)['attribute_value_id' => 13, 'value' => 'Samsung'],
            ];

            return view('admin.products.create', compact('categories', 'attributes', 'attributeValues'));
        })->name('create');

        Route::post('/store', fn () => '')->name('store');
        Route::view('/id/edit', 'admin.products.edit')->name('edit');
        Route::put('/{id}', fn () => '')->name('update');
        Route::view('/id', 'admin.products.detail')->name('detail');
        Route::post('/upload-file', fn () => '')->name('upload-file');
    });

    // --------- Quản lý danh mục (category) ---------
    Route::prefix('category')->name('category.')->group(function () {
        Route::view('/', 'admin.category.index')->name('index');
        Route::view('/create', 'admin.category.create')->name('create');
        Route::view('/edit', 'admin.category.edit')->name('edit');
    });

    // --------- Quản lý thuộc tính (attributes) ---------
    Route::prefix('attributes')->name('attributes.')->group(function () {
        Route::view('/', 'admin.attributes.index')->name('index');
        Route::view('/create', 'admin.attributes.create')->name('create');
        Route::view('/edit', 'admin.attributes.edit')->name('edit');
    });

    // --------- Quản lý vai trò (roles) ---------
    Route::prefix('roles')->name('roles.')->group(function () {
        Route::view('/', 'admin.roles.index')->name('index');
        Route::view('/create', 'admin.roles.create')->name('create');
        Route::get('/{id}', fn ($id) => view('admin.roles.show', compact('id')))->name('show');
        Route::get('/{id}/edit', fn ($id) => view('admin.roles.edit', compact('id')))->name('edit');
    });


});
