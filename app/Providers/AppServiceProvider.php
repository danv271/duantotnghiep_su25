<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use App\Models\Category;
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

        Paginator::useBootstrapFive();
        
        // Share categories with sidebar
        View::composer('admin.partials.sidebar', function ($view) {
            $view->with('categories', Category::orderBy('name')->get());
        });
    }
}
