<?php

use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Frontend routes
Route::get('/', [HomeController::class, 'index']);

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

Route::view('/cart', 'cart');

Route::get('/search', function () {
    return view('search');
})->name('search');

Route::get('/product-details', function () {
    return view('product-detail');
})->name('product-detail');

Route::get('/category', function () {
    return view('category');
})->name('category');


Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');


// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Attributes
    Route::controller(AttributeController::class)->prefix('attributes')->name('attributes.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // Products
    Route::prefix('products')->name('products.')->group(function () {
        // Danh sách sản phẩm
        Route::get('/', function () {
            return view('admin.products.list');
        })->name('list');

        // Tạo sản phẩm
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
        })->name('create');
        Route::post('/', function () {
            //
        })->name('store');

        // Chỉnh sửa sản phẩm
        Route::get('/{id}/edit', function () {
            return view('admin.products.edit');
        })->name('edit');
        Route::put('/{id}', function () {
            //
        })->name('update');

        // Chi tiết sản phẩm
        Route::get('/{id}', function () {
            return view('admin.products.detail');
        })->name('detail');

        // Upload file (dùng POST thay vì GET)
        Route::post('/upload-file', function () {
            // Xử lý upload file
        })->name('upload-file');
    });

    // Categories
    Route::controller(CategoryController::class)->prefix('categories')->name('categories.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{category}', 'show')->name('show');
        Route::get('/{category}/edit', 'edit')->name('edit');
        Route::put('/{category}', 'update')->name('update');
        Route::delete('/{category}', 'destroy')->name('destroy');
    });

    // Orders
    Route::controller(OrderController::class)->prefix('orders')->name('orders.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // Roles
    Route::prefix('roles')->name('roles.')->group(function () {
        Route::get('/', function () {
            return view('admin.roles.index');
        })->name('index');
        Route::get('/create', function () {
            return view('admin.roles.create');
        })->name('create');
        Route::get('/{id}', function ($id) {
            return view('admin.roles.show', ['id' => $id]);
        })->name('show');
        Route::get('/{id}/edit', function ($id) {
            return view('admin.roles.edit', ['id' => $id]);
        })->name('edit');
    });
});

