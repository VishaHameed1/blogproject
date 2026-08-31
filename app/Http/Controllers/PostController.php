<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    /**
     * Display a listing of published blog posts.
     */
    public function index(Request $request)
    {
        $search = trim($request->query('q', ''));
        $page = max((int) $request->query('page', 1), 1);

        if ($request->header('HX-Request') && $search !== '') {
            return $this->suggestions($request);
        }

        if ($search !== '') {
            $posts = Post::with('category')
                ->where('status', 'published')
                ->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%{$search}%")
                          ->orWhere('content', 'like', "%{$search}%")
                          ->orWhere('body', 'like', "%{$search}%");
                })
                ->latest()
                ->paginate(12)
                ->appends(['q' => $search]);
        } else {
            // Flexible query check (Handles null published_at dates safely)
            $posts = Post::with('category')
                ->where('status', 'published')
                ->latest()
                ->paginate(12);
        }

        $categories = Category::orderBy('name')->get();

        return view('posts.index', compact(
            'posts',
            'categories',
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
            ->where('title', 'like', "%{$query}%")
            ->select(['id', 'title', 'slug', 'published_at'])
            ->latest()
            ->limit(5)
            ->get();

        $categories = Category::query()
            ->where('name', 'like', "%{$query}%")
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

        if ($search !== '') {
            $posts = Post::with('category')
                ->where('category_id', $category->id)
                ->where('status', 'published')
                ->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%{$search}%")
                          ->orWhere('content', 'like', "%{$search}%");
                })
                ->latest()
                ->paginate(12)
                ->appends(['q' => $search]);
        } else {
            $posts = $category->posts()
                ->where('status', 'published')
                ->latest()
                ->paginate(12);
        }

        $categories = Category::orderBy('name')->get();

        return view('posts.index', compact(
            'posts',
            'categories',
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

            // Sync post to user history without creating duplicate rows, updating timestamp
            $user->readHistory()->syncWithoutDetaching([
                $post->id => ['updated_at' => now()]
            ]);
        }

        $post->load('category');

        $relatedPosts = Post::with('category')
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