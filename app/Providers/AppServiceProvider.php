<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use App\Http\Middleware\CheckUserRole;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
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
        URL::forceScheme('https');
        Paginator::useBootstrapFour();

        // Alias cho middleware CheckUserRole
        Route::aliasMiddleware('check.role', CheckUserRole::class);

        // Chia sẻ các danh mục với sidebar
        View::composer('admin.partials.sidebar', function ($view) {
            $view->with('categories', Category::orderBy('category_name')->get());
        });
    }
}
