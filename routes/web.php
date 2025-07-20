<?php

use App\Http\Controllers\Admin\AccountController as AdminAccountController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController; // Controller cho sản phẩm ở cả client và admin nếu dùng chung
use App\Http\Controllers\VariantController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Định nghĩa tất cả route cho web.
| Các route người dùng (client) và quản trị (admin) được tách riêng gọn gàng.
*/

// --- Routes cho mục đích Test/Debug (Nên xóa khi deploy Production) ---
Route::get('/test-cart', function() {
    $cart = [
        '1' => [
            'id' => '1',
            'name' => 'Test Product',
            'base_price' => 100000,
            'quantity' => 2,
            'image' => 'images/default-product.jpg',
            'color' => 'Red',
            'size' => 'L'
        ]
    ];
    session()->put('cart', $cart);
    return redirect()->route('cart.index');
})->name('test.cart'); // Đặt tên cho route để dễ dàng truy cập

// --- Routes chung cho giao diện người dùng (Client-side) ---
// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Product listings and details
Route::get('/products/{category_id?}', [ProductController::class, 'indexClient'])->name('products.index');
Route::get('/products-show/{id}', [ProductController::class, 'showClient'])->name('products.show');

Route::view('/category', 'category')->name('category');

// Search page
Route::view('/search', 'search')->name('search');

// Product details (redundant with products/{id}, consider removing if showClient handles everything)
Route::view('/product-details', 'product-details')->name('product-details'); // Nếu dùng product/{id}, nên xóa cái này

// --- Authentication Routes ---
// Login / Register Form
Route::get('/login', function () {
    return view('auth.login-register');
})->name('login');
Route::get('/register', function () {
    return view('auth.login-register');
})->name('register');

// Auth Processes
Route::post('login-process', [AuthController::class, 'handleLogin'])->name('login.process');
Route::post('register-process', [AuthController::class, 'handleregister'])->name('register.process');
Route::post('/logout', [AuthController::class, 'destroy'])->name('auth.destroy');

// Forgot Password
Route::get('forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password');
Route::post('/forgot-password/process', [AuthController::class, 'handleForgotPassword'])->name('forgot-password.process');

// Reset Password
Route::get('/reset-password', [AuthController::class, 'resetPassword'])->name('reset.password');
Route::put('/reset-password/process', [AuthController::class, 'handleResetPassword'])->name('reset.password.process');

// --- User Account & Profile (Yêu cầu đăng nhập) ---
Route::middleware('auth')->group(function () {
    Route::get('/account', [AdminAccountController::class, "index"])->name('account'); // Có vẻ là AccountController của Admin, cần đổi tên nếu có AccountController riêng cho user
    Route::put('/update_pass', [AuthController::class, 'updatePass'])->name('update_pass');

    
});
    // User's Orders
    Route::prefix('orders')->name('orders.')->group(function () {
        Route::get('/', [AdminOrderController::class, "indexClient"])->name('index'); // Đặt tên controller rõ hơn nếu đây là user order
    });
// --- Cart Routes ---
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/add', [CartController::class, 'add'])->name('add');
    Route::post('/update', [CartController::class, 'update'])->name('update');
    Route::delete('/remove/{id}', [CartController::class, 'remove'])->name('remove');
    Route::delete('/clear', [CartController::class, 'clear'])->name('clear');
    Route::delete('/remove-session/{variantId}', [CartController::class, 'removeSession'])->name('removeSession');
});

// --- Checkout Routes ---
// Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/store', [CheckoutController::class, 'store'])->name('checkout.process');
Route::get('/checkout/success/{id}', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/checkout/vnpay-return', [CheckoutController::class, 'vnpayReturn'])->name('checkout.vnpay-return');

// admin

Route::prefix('admin')->name('admin.')->middleware('check.admin')->group(function () {
    // Dashboard
    Route::view('/', 'admin.dashboard')->name('dashboard'); // Redirect admin/ to dashboard
    Route::view('/dashboard', 'admin.dashboard')->name('dashboard'); // Explicit dashboard route

    // --- Quản lý Sản phẩm (Products) ---
    // Sử dụng Route::controller để nhóm gọn gàng các hành động CRUD
    Route::controller(ProductController::class)->prefix('products')->name('products.')->group(function () {
        Route::get('/list', 'index')->name('list'); // admin.products.list
        Route::get('/create', 'create')->name('create'); // admin.products.create (Show form)
        Route::post('/store', 'store')->name('store'); // admin.products.store (Save data)
        Route::get('/edit/{id}', 'edit')->name('edit'); // admin.products.edit (Show edit form)
        Route::put('/update/{id}', 'update')->name('update'); // admin.products.update (Update data)
        Route::get('/detail/{id}', 'show')->name('detail'); // admin.products.detail (Show detail)

        // Variants (thuộc về sản phẩm, nên đặt trong nhóm products)
        Route::put('/variant/update/{id}', [VariantController::class, 'update'])->name('variant-update');
        Route::delete('/variant/delete/{id}', [VariantController::class, 'destroy'])->name('variant-delete');
        Route::post('/variant/add', [VariantController::class, 'store'])->name('variant-add');
    });

    // --- Quản lý Danh mục (Categories) ---
    Route::controller(CategoryController::class)->prefix('categories')->name('categories.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/trashed', 'trashed')->name('trashed');
        Route::patch('/restore-all', 'restoreAll')->name('restore-all');
        Route::delete('/force-delete-all', 'forceDeleteAll')->name('force-delete-all');

        // Routes với parameter
        Route::get('/{category}', 'show')->name('show'); // Có thể bỏ nếu không có trang show riêng
        Route::get('/{category}/edit', 'edit')->name('edit');
        Route::put('/{category}', 'update')->name('update');
        Route::delete('/{category}', 'destroy')->name('destroy');

        // Soft delete routes với parameter
        Route::patch('/{id}/restore', 'restore')->name('restore');
        Route::delete('/{id}/force-delete', 'forceDelete')->name('force-delete');
    });

    // --- Quản lý Thuộc tính (Attributes) ---
    Route::controller(AttributeController::class)->prefix('attributes')->name('attributes.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // --- Quản lý Đơn hàng (Orders) ---
    Route::controller(AdminOrderController::class)->prefix('orders')->name('orders.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // --- Quản lý Vai trò (Roles) ---
    Route::controller(RoleController::class)->prefix('roles')->name('roles.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        // Không có route update/delete? Có thể thêm vào nếu cần
    });

    // --- Quản lý Tài khoản Admin (Accounts) ---
    // Nếu có quản lý tài khoản người dùng/admin trong admin panel
    // Route::controller(AdminAccountController::class)->prefix('accounts')->name('accounts.')->group(function () {
    //     Route::get('/', 'index')->name('index');
    //     Route::get('/create', 'create')->name('create');
    //     Route::post('/', 'store')->name('store');
    //     Route::get('/{id}/edit', 'edit')->name('edit');
    //     Route::put('/{id}', 'update')->name('update');
    //     Route::delete('/{id}', 'destroy')->name('destroy');
    // });
});