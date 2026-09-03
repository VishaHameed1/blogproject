<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display admin dashboard.
     */
    public function index()
    {
        $now = now();

        /*
        |--------------------------------------------------------------------------
        | BASIC STATISTICS
        |--------------------------------------------------------------------------
        */

        $stats = [
            'total_posts' => Post::count(),

            /*
             * Published:
             * Uses the Post model's published() scope.
             */
            'published_posts' => Post::published()->count(),

            /*
             * Scheduled:
             * A post scheduled for a future date.
             *
             * We intentionally don't require status = pending because
             * published_at is the actual scheduling date.
             */
            'pending_posts' => Post::whereNotNull('published_at')
                ->where('published_at', '>', $now)
                ->count(),

            /*
             * Draft:
             * Only posts explicitly marked as draft.
             *
             * This avoids the previous:
             * where(status = draft) OR published_at IS NULL
             * problem.
             */
            'draft_posts' => Post::where('status', 'draft')->count(),

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
            ->take(10)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | TOP POSTS BY VIEWS
        |--------------------------------------------------------------------------
        */

        $topPostsWithViews = DB::table('post_user_history')
            ->select(
                'post_id',
                DB::raw('COUNT(*) as views_count')
            )
            ->groupBy('post_id')
            ->orderByDesc('views_count')
            ->limit(5)
            ->get();

        $topPostLabels = [];
        $topPostViews = [];

        if ($topPostsWithViews->isNotEmpty()) {
            $postIds = $topPostsWithViews
                ->pluck('post_id')
                ->filter()
                ->values()
                ->all();

            $posts = Post::whereIn('id', $postIds)
                ->get()
                ->keyBy('id');

            foreach ($topPostsWithViews as $item) {
                $post = $posts->get($item->post_id);

                if (!$post) {
                    continue;
                }

                $topPostLabels[] = mb_strlen($post->title) > 20
                    ? mb_substr($post->title, 0, 20) . '...'
                    : $post->title;

                $topPostViews[] = (int) $item->views_count;
            }
        }

        /*
         * Fallback when there is no view history yet.
         */
        if (empty($topPostLabels)) {
            $fallbackPosts = Post::latest('created_at')
                ->take(5)
                ->get();

            foreach ($fallbackPosts as $post) {
                $topPostLabels[] = mb_strlen($post->title) > 20
                    ? mb_substr($post->title, 0, 20) . '...'
                    : $post->title;

                $topPostViews[] = 0;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | ACCOUNT STATISTICS
        |--------------------------------------------------------------------------
        */

        $accountStats = [
            'total_users' => $stats['total_users'],

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
                $now->toDateString()
            )->count(),

            'new_users_this_week' => User::whereBetween(
                'created_at',
                [
                    $now->copy()->startOfWeek(),
                    $now->copy()->endOfWeek(),
                ]
            )->count(),

            'new_users_this_month' => User::whereBetween(
                'created_at',
                [
                    $now->copy()->startOfMonth(),
                    $now->copy()->endOfMonth(),
                ]
            )->count(),
        ];

        /*
        |--------------------------------------------------------------------------
        | CURRENT / PREVIOUS MONTH VIEWS
        |--------------------------------------------------------------------------
        */

        $currentMonthStart = $now->copy()->startOfMonth();
        $currentMonthEnd = $now->copy()->endOfMonth();

        $previousMonthStart = $now->copy()
            ->subMonthNoOverflow()
            ->startOfMonth();

        $previousMonthEnd = $now->copy()
            ->subMonthNoOverflow()
            ->endOfMonth();

        $currentMonthViews = DB::table('post_user_history')
            ->whereBetween('created_at', [
                $currentMonthStart,
                $currentMonthEnd,
            ])
            ->count();

        $previousMonthViews = DB::table('post_user_history')
            ->whereBetween('created_at', [
                $previousMonthStart,
                $previousMonthEnd,
            ])
            ->count();

        $viewsChange = $previousMonthViews > 0
            ? (($currentMonthViews - $previousMonthViews) / $previousMonthViews) * 100
            : ($currentMonthViews > 0 ? 100 : 0);

        /*
        |--------------------------------------------------------------------------
        | 12-MONTH TRAFFIC DATA
        |--------------------------------------------------------------------------
        |
        | Previously this executed 12 COUNT queries.
        | Now we fetch all 12 months in one grouped query.
        |
        */

        $trafficStart = $now
            ->copy()
            ->subMonths(11)
            ->startOfMonth();

        $monthlyTraffic = DB::table('post_user_history')
            ->select(
                DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month_key"),
                DB::raw('COUNT(*) as views_count')
            )
            ->where('created_at', '>=', $trafficStart)
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
            ->pluck('views_count', 'month_key');

        $chartData = [];

        for ($i = 11; $i >= 0; $i--) {
            $date = $now->copy()->subMonthsNoOverflow($i);
            $monthKey = $date->format('Y-m');

            $chartData[] = [
                'month' => $date->format('M Y'),
                'current' => (int) ($monthlyTraffic[$monthKey] ?? 0),
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | LAST 7 DAYS VIEWS
        |--------------------------------------------------------------------------
        */

        $weekStart = $now
            ->copy()
            ->subDays(6)
            ->startOfDay();

        $dailyTraffic = DB::table('post_user_history')
            ->select(
                DB::raw("DATE(created_at) as day_key"),
                DB::raw('COUNT(*) as views_count')
            )
            ->where('created_at', '>=', $weekStart)
            ->groupBy(DB::raw('DATE(created_at)'))
            ->pluck('views_count', 'day_key');

        $weeklyData = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = $now->copy()->subDays($i);
            $dayKey = $date->format('Y-m-d');

            $weeklyData[] = [
                'day' => $date->format('D'),
                'views' => (int) ($dailyTraffic[$dayKey] ?? 0),
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | MONTHLY CONTENT TARGET
        |--------------------------------------------------------------------------
        */

        $monthlyTarget = 20;

        $publishedThisMonth = Post::published()
            ->whereBetween('published_at', [
                $currentMonthStart,
                $currentMonthEnd,
            ])
            ->count();

        $targetPercentage = $monthlyTarget > 0
            ? min(
                100,
                round(($publishedThisMonth / $monthlyTarget) * 100)
            )
            : 0;

        /*
        |--------------------------------------------------------------------------
        | TOP CATEGORIES
        |--------------------------------------------------------------------------
        |
        | Only published posts should contribute to public-facing category
        | popularity.
        |
        */

        $topCategories = Category::withCount([
                'posts as posts_count' => function ($query) {
                    $query->whereNotNull('published_at')
                        ->where('published_at', '<=', now());
                },
            ])
            ->orderByDesc('posts_count')
            ->take(5)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | RECENT USERS
        |--------------------------------------------------------------------------
        */

        $recentUsers = User::latest('created_at')
            ->take(5)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | POST STATUS BREAKDOWN
        |--------------------------------------------------------------------------
        */

        $statusData = [
            'labels' => [
                'Published',
                'Scheduled',
                'Drafts',
            ],

            'data' => [
                $stats['published_posts'],
                $stats['pending_posts'],
                $stats['draft_posts'],
            ],

            'colors' => [
                '#22C55E',
                '#7C3AED',
                '#9CA3AF',
            ],

            'darkColors' => [
                '#4ADE80',
                '#3B82F6',
                'rgba(255,255,255,0.3)',
            ],
        ];

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD ANALYTICS
        |--------------------------------------------------------------------------
        */

        $dashboardStats = [
            'current_month_views' => $currentMonthViews,
            'previous_month_views' => $previousMonthViews,
            'views_change' => round($viewsChange, 1),

            'published_this_month' => $publishedThisMonth,

            'monthly_target' => $monthlyTarget,

            'target_percentage' => $targetPercentage,
        ];

        /*
        |--------------------------------------------------------------------------
        | ENGAGEMENT METRICS
        |--------------------------------------------------------------------------
        */

        $engagement = [
            'avg_views_per_post' => $stats['total_posts'] > 0
                ? round(
                    $stats['total_views'] / $stats['total_posts'],
                    1
                )
                : 0,

            'views_per_user' => $stats['total_users'] > 0
                ? round(
                    $stats['total_views'] / $stats['total_users'],
                    1
                )
                : 0,

            'posts_per_category' => $stats['total_categories'] > 0
                ? round(
                    $stats['total_posts'] / $stats['total_categories'],
                    1
                )
                : 0,
        ];

        /*
        |--------------------------------------------------------------------------
        | RETURN DASHBOARD
        |--------------------------------------------------------------------------
        */

        return view('admin.dashboard', compact(
            'stats',
            'recent_posts',
            'accountStats',
            'chartData',
            'weeklyData',
            'dashboardStats',
            'topCategories',
            'topPostLabels',
            'topPostViews',
            'recentUsers',
            'statusData',
            'engagement'
        ));
    }
}