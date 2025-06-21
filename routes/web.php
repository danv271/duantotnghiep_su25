<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

// Route::get('/', function () {
//     return view('index');
// });
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


Route::get('/products', [ProductController::class, 'indexClient']);
Route::get('/products/{id}', [ProductController::class, 'showClient'])->name('products.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index')->name('categories.index');
        Route::get('/categories/create', 'create')->name('categories.create');
        Route::post('/categories', 'store')->name('categories.store');
        Route::get('/categories/{category}', 'show')->name('categories.show');
        Route::get('/categories/{category}/edit', 'edit')->name('categories.edit');
        Route::put('/categories/{category}', 'update')->name('categories.update');
        Route::delete('/categories/{category}', 'destroy')->name('categories.destroy');
    });
});

Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
Route::get('/admin/orders/{id}', [OrderController::class, 'show'])->name('admin.orders.show');
Route::get('/admin/orders/{id}/edit', [OrderController::class, 'edit'])->name('admin.orders.edit');
Route::put('admin/orders/{id}', [OrderController::class, 'update'])->name('admin.orders.update');
Route::delete('/admin/orders/{id}/destroy', [OrderController::class, 'destroy'])->name('admin.orders.destroy');

