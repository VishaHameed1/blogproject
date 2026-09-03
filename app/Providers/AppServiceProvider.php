<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use App\Observers\PostObserver;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

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
        /*
        |--------------------------------------------------------------------------
        | HTTPS / Tunnel Detection - COMPLETELY DISABLED FOR LOCAL
        |--------------------------------------------------------------------------
        */

        // Force HTTP for local development (remove HTTPS redirection)
        // URL::forceScheme('http');

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
        | Global Navigation Categories (Frontend)
        |--------------------------------------------------------------------------
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

        /*
        |--------------------------------------------------------------------------
        | Admin Layout Data (Optional)
        |--------------------------------------------------------------------------
        */

        View::composer('layouts.admin', function ($view) {
            // Quick stats for admin sidebar or header
            $adminStats = Cache::remember(
                'admin_quick_stats',
                300, // 5 minutes cache
                function () {
                    return [
                        'total_posts' => Post::count(),
                        'published_posts' => Post::published()->count(),
                        'pending_posts' => Post::where('status', 'pending')
                            ->whereNotNull('published_at')
                            ->where('published_at', '>', now())
                            ->count(),
                        'draft_posts' => Post::where('status', 'draft')
                            ->orWhereNull('published_at')
                            ->count(),
                        'total_views' => DB::table('post_user_history')->count(),
                    ];
                }
            );

            $view->with('adminStats', $adminStats);
        });

        /*
        |--------------------------------------------------------------------------
        | Share Categories with All Views (Optional)
        |--------------------------------------------------------------------------
        */

        View::composer('*', function ($view) {
            // Only if you need categories everywhere
            // $view->with('allCategories', Category::orderBy('name')->get());
        });
    }
}