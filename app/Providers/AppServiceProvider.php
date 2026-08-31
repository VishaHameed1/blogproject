<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Observers\PostObserver;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap application services.
     */
    public function boot(): void
    {
        // Fix for MySQL key length error
        Schema::defaultStringLength(191);

        /*
        |--------------------------------------------------------------------------
        | Post Observer
        |--------------------------------------------------------------------------
        */

        Post::observe(PostObserver::class);


        /*
        |--------------------------------------------------------------------------
        | Global Navigation Categories
        |--------------------------------------------------------------------------
        |
        | Makes $navCategories available inside layouts.app.
        | Cached for 1 hour to avoid querying categories on every request.
        |
        */

        View::composer('layouts.app', function ($view) {

            $navCategories = Cache::remember(
                'chronicle_nav_categories',
                3600,
                function () {
                    return Category::query()
                        ->orderBy('name')
                        ->take(6)
                        ->get();
                }
            );

            $view->with('navCategories', $navCategories);
        });
    }
}