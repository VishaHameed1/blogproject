<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of published blog posts.
     */
    public function index(Request $request)
    {
        $search = trim($request->query('q', ''));
        $page = max((int) $request->query('page', 1), 1);

        // If HTMX request, return suggestions
        if ($request->header('HX-Request') && $search !== '') {
            return $this->suggestions($request);
        }

        // Build the query
        $query = Post::with(['user', 'category'])
            ->where('status', 'published');

        // Apply search filter if search term exists
        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('body', 'LIKE', "%{$search}%")
                    ->orWhere('content', 'LIKE', "%{$search}%");
            });
        }

        $posts = $query->latest('published_at')
            ->paginate(12)
            ->appends(['q' => $search]);

        $categories = Category::orderBy('name')->get();
        $navCategories = Category::orderBy('name')->take(6)->get();

        return view('posts.index', compact(
            'posts',
            'categories',
            'navCategories',
            'search'
        ));
    }

    /**
     * Provide real-time autocomplete suggestions for HTMX.
     */
    public function suggestions(Request $request)
    {
        $query = trim($request->query('q', ''));

        if ($query === '') {
            return response('');
        }

        $posts = Post::query()
            ->where('status', 'published')
            ->where('title', 'LIKE', "%{$query}%")
            ->with(['user', 'category'])
            ->select(['id', 'title', 'slug', 'published_at', 'category_id', 'user_id'])
            ->latest('published_at')
            ->limit(5)
            ->get();

        $categories = Category::query()
            ->where('name', 'LIKE', "%{$query}%")
            ->select(['id', 'name', 'slug'])
            ->orderBy('name')
            ->limit(4)
            ->get();

        if ($request->header('HX-Request')) {
            return view('posts.partials.search-dropdown', compact('posts', 'categories', 'query'));
        }

        return response()->json([
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }

    /**
     * Display all categories with published post count.
     */
    public function categories()
    {
        $categories = Category::withCount([
            'posts' => function ($query) {
                $query->where('status', 'published');
            },
        ])
            ->orderBy('name')
            ->get();

        return view('posts.categories', compact('categories'));
    }

    /**
     * Display posts filtered by category.
     */
    public function byCategory(Request $request, Category $category)
    {
        $search = trim($request->query('q', ''));

        $query = Post::with(['user', 'category'])
            ->where('category_id', $category->id)
            ->where('status', 'published');

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('body', 'LIKE', "%{$search}%")
                    ->orWhere('content', 'LIKE', "%{$search}%");
            });
        }

        $posts = $query->latest('published_at')
            ->paginate(12)
            ->appends(['q' => $search]);

        $categories = Category::orderBy('name')->get();
        $navCategories = Category::orderBy('name')->take(6)->get();

        return view('posts.index', compact(
            'posts',
            'categories',
            'navCategories',
            'category',
            'search'
        ));
    }

    /**
     * Display a single published post with related articles and save to user reading history.
     */
    public function show(Post $post)
    {
        abort_unless($post->status === 'published', 404);

        // Record reading history if user is authenticated
        if (Auth::check()) {
            /** @var \App\Models\User $user */
            $user = Auth::user();

            // Check if history record already exists
            $existing = DB::table('post_user_history')
                ->where('post_id', $post->id)
                ->where('user_id', $user->id)
                ->first();

            if ($existing) {
                // Update existing record
                DB::table('post_user_history')
                    ->where('post_id', $post->id)
                    ->where('user_id', $user->id)
                    ->update([
                        'viewed_at' => now(),
                        'updated_at' => now(),
                    ]);
            } else {
                // Insert new record
                DB::table('post_user_history')->insert([
                    'post_id' => $post->id,
                    'user_id' => $user->id,
                    'viewed_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Also sync via the many-to-many relationship for user's read history
            $user->readHistory()->syncWithoutDetaching([
                $post->id => [
                    'viewed_at' => now(),
                    'updated_at' => now()
                ]
            ]);
        }

        $post->load(['user', 'category']);

        $relatedPosts = Post::with(['user', 'category'])
            ->where('id', '!=', $post->id)
            ->where('status', 'published')
            ->inRandomOrder()
            ->take(5)
            ->get();

        return view('posts.show', compact(
            'post',
            'relatedPosts'
        ));
    }
}
