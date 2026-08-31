<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display admin dashboard.
     */
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | BASIC STATISTICS
        |--------------------------------------------------------------------------
        */

        $stats = [
            'total_posts' => Post::count(),

            'published_posts' => Post::whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->count(),

            'draft_posts' => Post::whereNull('published_at')
                ->count(),

            'total_categories' => Category::count(),

            'total_users' => User::count(),

            'total_views' => DB::table('post_user_history')->count(),
        ];


        /*
        |--------------------------------------------------------------------------
        | RECENT POSTS
        |--------------------------------------------------------------------------
        */

        $recent_posts = Post::with([
                'category',
                'author',
            ])
            ->latest('created_at')
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | ACCOUNT STATISTICS
        |--------------------------------------------------------------------------
        | Replaced `whereHas('role')` with `whereHas('customRole')` to avoid 
        | triggering Spatie's `scopeRole($query, $roles)` method.
        */

        $accountStats = [
            'total_users' => User::count(),

            'admin_users' => User::whereHas('customRole', function ($query) {
                $query->where('slug', 'admin');
            })->count(),

            'editor_users' => User::whereHas('customRole', function ($query) {
                $query->where('slug', 'editor');
            })->count(),

            'author_users' => User::whereHas('customRole', function ($query) {
                $query->where('slug', 'author');
            })->count(),

            'subscriber_users' => User::whereHas('customRole', function ($query) {
                $query->where('slug', 'subscriber');
            })->count(),

            'users_without_role' => User::whereNull('role_id')->count(),

            'new_users_today' => User::whereDate(
                'created_at',
                today()
            )->count(),

            'new_users_this_week' => User::whereBetween(
                'created_at',
                [
                    now()->startOfWeek(),
                    now()->endOfWeek(),
                ]
            )->count(),

            'new_users_this_month' => User::whereBetween(
                'created_at',
                [
                    now()->startOfMonth(),
                    now()->endOfMonth(),
                ]
            )->count(),
        ];


        /*
        |--------------------------------------------------------------------------
        | CURRENT MONTH VIEWS
        |--------------------------------------------------------------------------
        */

        $currentMonthViews = DB::table('post_user_history')
            ->whereBetween('created_at', [
                now()->startOfMonth(),
                now()->endOfMonth(),
            ])
            ->count();


        /*
        |--------------------------------------------------------------------------
        | PREVIOUS MONTH VIEWS
        |--------------------------------------------------------------------------
        */

        $previousMonthViews = DB::table('post_user_history')
            ->whereBetween('created_at', [
                now()->copy()->subMonth()->startOfMonth(),
                now()->copy()->subMonth()->endOfMonth(),
            ])
            ->count();


        /*
        |--------------------------------------------------------------------------
        | VIEWS CHANGE
        |--------------------------------------------------------------------------
        */

        if ($previousMonthViews > 0) {

            $viewsChange =
                (($currentMonthViews - $previousMonthViews)
                / $previousMonthViews) * 100;

        } else {

            $viewsChange = $currentMonthViews > 0
                ? 100
                : 0;
        }


        /*
        |--------------------------------------------------------------------------
        | 7 MONTH TRAFFIC DATA
        |--------------------------------------------------------------------------
        */

        $chartData = [];

        for ($i = 6; $i >= 0; $i--) {

            $date = now()->copy()->subMonths($i);

            $monthStart = $date->copy()->startOfMonth();

            $monthEnd = $date->copy()->endOfMonth();


            /*
            | Current month
            */

            $currentViews = DB::table('post_user_history')
                ->whereBetween('created_at', [
                    $monthStart,
                    $monthEnd,
                ])
                ->count();


            /*
            | Previous month
            */

            $previousMonth = $date->copy()->subMonth();

            $previousViews = DB::table('post_user_history')
                ->whereBetween('created_at', [
                    $previousMonth->copy()->startOfMonth(),
                    $previousMonth->copy()->endOfMonth(),
                ])
                ->count();


            $chartData[] = [
                'month' => $date->format('M'),

                'current_raw' => $currentViews,

                'previous_raw' => $previousViews,

                'current' => $currentViews,

                'previous' => $previousViews,
            ];
        }


        /*
        |--------------------------------------------------------------------------
        | NORMALIZE CHART HEIGHTS
        |--------------------------------------------------------------------------
        */

        $maxChartValue = collect($chartData)
            ->flatMap(function ($item) {
                return [
                    $item['current'],
                    $item['previous'],
                ];
            })
            ->max();

        $maxChartValue = max(
            (int) $maxChartValue,
            1
        );


        $chartData = collect($chartData)
            ->map(function ($item) use ($maxChartValue) {

                $item['current'] = $item['current'] > 0
                    ? max(
                        5,
                        min(
                            100,
                            round(
                                ($item['current'] / $maxChartValue) * 100
                            )
                        )
                    )
                    : 0;


                $item['previous'] = $item['previous'] > 0
                    ? max(
                        5,
                        min(
                            100,
                            round(
                                ($item['previous'] / $maxChartValue) * 100
                            )
                        )
                    )
                    : 0;


                return $item;

            })
            ->values()
            ->toArray();


        /*
        |--------------------------------------------------------------------------
        | MONTHLY CONTENT TARGET
        |--------------------------------------------------------------------------
        */

        $monthlyTarget = 20;


        $publishedThisMonth = Post::whereNotNull('published_at')
            ->whereBetween('published_at', [
                now()->startOfMonth(),
                now()->endOfMonth(),
            ])
            ->count();


        $targetPercentage = $monthlyTarget > 0
            ? round(
                ($publishedThisMonth / $monthlyTarget) * 100
            )
            : 0;


        $targetPercentage = min(
            100,
            $targetPercentage
        );


        /*
        |--------------------------------------------------------------------------
        | TOP CATEGORIES
        |--------------------------------------------------------------------------
        */

        $topCategories = Category::withCount('posts')
            ->orderByDesc('posts_count')
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | DASHBOARD ANALYTICS
        |--------------------------------------------------------------------------
        */

        $dashboardStats = [

            'current_month_views' =>
                $currentMonthViews,

            'previous_month_views' =>
                $previousMonthViews,

            'views_change' =>
                round($viewsChange, 1),

            'published_this_month' =>
                $publishedThisMonth,

            'monthly_target' =>
                $monthlyTarget,

            'target_percentage' =>
                $targetPercentage,
        ];


        /*
        |--------------------------------------------------------------------------
        | RETURN DASHBOARD
        |--------------------------------------------------------------------------
        */

        return view(
            'admin.dashboard',
            compact(
                'stats',
                'recent_posts',
                'accountStats',
                'chartData',
                'dashboardStats',
                'topCategories'
            )
        );
    }
}