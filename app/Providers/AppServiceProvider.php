<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use App\Http\Middleware\CheckUserRole; // Từ nhánh HEAD
use Illuminate\Support\Facades\Route;  // Từ nhánh HEAD
use App\Models\Category;               // Từ nhánh main
use Illuminate\Support\Facades\View;   // Từ nhánh main
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Paginator::useBootstrapFive();
        
        // Share categories with sidebar
        // Alias cho middleware CheckUserRole
        Route::aliasMiddleware('check.role', CheckUserRole::class);

        // Chia sẻ các danh mục với sidebar
        View::composer('admin.partials.sidebar', function ($view) {
            $view->with('categories', Category::orderBy('category_name')->get());
        });
    }
}