<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of posts in the admin panel.
     */
    public function index(Request $request)
    {
        $categories = Category::orderBy('name')->get();

        $posts = Post::with(['category', 'user'])
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = trim($request->search);

                $query->where('title', 'like', "%{$search}%");
            })
            ->when($request->filled('category'), function ($query) use ($request) {
                $query->where('category_id', $request->category);
            })
            ->when($request->filled('status'), function ($query) use ($request) {
                switch ($request->status) {
                    case 'published':
                        $query->where('is_published', true)
                            ->where('status', 'published');
                        break;

                    case 'draft':
                        $query->where('is_published', false)
                            ->where('status', 'draft');
                        break;

                    case 'pending':
                        $query->where('status', 'pending');
                        break;

                    case 'rejected':
                        $query->where('status', 'rejected');
                        break;
                }
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.posts.index', compact(
            'posts',
            'categories'
        ));
    }

    /**
     * Show the form for creating a new post.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created post.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'category_id' => [
                'required',
                'exists:categories,id',
            ],

            'body' => [
                'required',
                'string',
            ],

            'image_upload' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,webp',
                'max:5120',
            ],

            'is_published' => [
                'nullable',
                'boolean',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Check authentication
        |--------------------------------------------------------------------------
        */

        if (!Auth::check()) {
            abort(401, 'You must be logged in to create a post.');
        }

        /*
        |--------------------------------------------------------------------------
        | Create post
        |--------------------------------------------------------------------------
        */

        $post = new Post();

        /*
         * Get authenticated user's ID.
         *
         * Your route is protected by:
         * Route::middleware(['auth'])
         */
        $post->user_id = Auth::id();

        $post->title = $validated['title'];

        /*
        |--------------------------------------------------------------------------
        | Generate unique slug
        |--------------------------------------------------------------------------
        */

        $baseSlug = Str::slug($validated['title']);

        if ($baseSlug === '') {
            $baseSlug = 'post';
        }

        $slug = $baseSlug;
        $counter = 1;

        while (Post::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        $post->slug = $slug;

        /*
        |--------------------------------------------------------------------------
        | Post content
        |--------------------------------------------------------------------------
        */

        $post->body = $validated['body'];
        $post->category_id = $validated['category_id'];

        /*
        |--------------------------------------------------------------------------
        | Publishing status
        |--------------------------------------------------------------------------
        */

        $isPublished = $request->boolean('is_published');

        $post->is_published = $isPublished;

        $post->status = $isPublished
            ? 'published'
            : 'draft';

        $post->published_at = $isPublished
            ? now()
            : null;

        /*
        |--------------------------------------------------------------------------
        | Featured image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image_upload')) {
            $path = $request
                ->file('image_upload')
                ->store('posts', 'public');

            $post->featured_image = $path;
        }

        /*
        |--------------------------------------------------------------------------
        | Save
        |--------------------------------------------------------------------------
        */

        $post->save();

        /*
        |--------------------------------------------------------------------------
        | Clear cache
        |--------------------------------------------------------------------------
        */

        Cache::forget('posts:index');

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Post created successfully!');
    }

    /**
     * Show the form for editing a post.
     */
    public function edit(Post $post)
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.posts.edit', compact(
            'post',
            'categories'
        ));
    }

    /**
     * Update an existing post.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'category_id' => [
                'required',
                'exists:categories,id',
            ],

            'body' => [
                'required',
                'string',
            ],

            'image_upload' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,webp',
                'max:5120',
            ],

            'remove_image' => [
                'nullable',
                'boolean',
            ],

            'is_published' => [
                'nullable',
                'boolean',
            ],

            'rejection_reason' => [
                'nullable',
                'string',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Update basic information
        |--------------------------------------------------------------------------
        */

        $post->title = $validated['title'];
        $post->body = $validated['body'];
        $post->category_id = $validated['category_id'];

        /*
        |--------------------------------------------------------------------------
        | Handle featured image
        |--------------------------------------------------------------------------
        */

        if (
            $request->boolean('remove_image') &&
            $post->featured_image
        ) {
            if (
                !filter_var(
                    $post->featured_image,
                    FILTER_VALIDATE_URL
                )
            ) {
                Storage::disk('public')->delete(
                    $post->featured_image
                );
            }

            $post->featured_image = null;
        } elseif ($request->hasFile('image_upload')) {

            /*
            | Delete old local image
            */

            if (
                $post->featured_image &&
                !filter_var(
                    $post->featured_image,
                    FILTER_VALIDATE_URL
                )
            ) {
                Storage::disk('public')->delete(
                    $post->featured_image
                );
            }

            /*
            | Store new image
            */

            $path = $request
                ->file('image_upload')
                ->store('posts', 'public');

            $post->featured_image = $path;
        }

        /*
        |--------------------------------------------------------------------------
        | Handle publishing status
        |--------------------------------------------------------------------------
        */

        if ($request->boolean('is_published')) {

            $post->is_published = true;
            $post->status = 'published';

            if (!$post->published_at) {
                $post->published_at = now();
            }

            /*
            | Clear previous rejection
            */

            $post->rejection_reason = null;

        } else {

            $post->is_published = false;
            $post->published_at = null;

            if ($request->filled('rejection_reason')) {

                $post->status = 'rejected';

                $post->rejection_reason =
                    $request->input('rejection_reason');

            } else {

                $post->status = 'draft';
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Save
        |--------------------------------------------------------------------------
        */

        $post->save();

        /*
        |--------------------------------------------------------------------------
        | Clear cache
        |--------------------------------------------------------------------------
        */

        Cache::forget('posts:index');

        Cache::forget(
            "posts:show:{$post->slug}"
        );

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Post updated successfully!');
    }

    /**
     * Delete a post.
     */
    public function destroy(Post $post)
    {
        /*
        |--------------------------------------------------------------------------
        | Delete featured image
        |--------------------------------------------------------------------------
        */

        if (
            $post->featured_image &&
            !filter_var(
                $post->featured_image,
                FILTER_VALIDATE_URL
            )
        ) {
            Storage::disk('public')->delete(
                $post->featured_image
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Clear cache
        |--------------------------------------------------------------------------
        */

        Cache::forget(
            "posts:show:{$post->slug}"
        );

        Cache::forget('posts:index');

        /*
        |--------------------------------------------------------------------------
        | Delete post
        |--------------------------------------------------------------------------
        */

        $post->delete();

        /*
        |--------------------------------------------------------------------------
        | HTMX request
        |--------------------------------------------------------------------------
        */

        if (request()->header('HX-Request')) {
            return response('', 200);
        }

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Post deleted successfully!');
    }

    /**
     * Toggle publish/draft status.
     */
    public function togglePublish(Post $post)
    {
        $newPublishState = !$post->is_published;

        /*
        |--------------------------------------------------------------------------
        | Publish
        |--------------------------------------------------------------------------
        */

        if ($newPublishState) {

            $post->is_published = true;
            $post->status = 'published';

            if (!$post->published_at) {
                $post->published_at = now();
            }

            $post->rejection_reason = null;

        /*
        |--------------------------------------------------------------------------
        | Unpublish
        |--------------------------------------------------------------------------
        */

        } else {

            $post->is_published = false;
            $post->status = 'draft';
            $post->published_at = null;
        }

        /*
        |--------------------------------------------------------------------------
        | Save
        |--------------------------------------------------------------------------
        */

        $post->save();

        /*
        |--------------------------------------------------------------------------
        | Clear cache
        |--------------------------------------------------------------------------
        */

        Cache::forget('posts:index');

        Cache::forget(
            "posts:show:{$post->slug}"
        );

        /*
        |--------------------------------------------------------------------------
        | HTMX response
        |--------------------------------------------------------------------------
        */

        if (request()->header('HX-Request')) {
            return view(
                'admin.posts._publish-button',
                compact('post')
            );
        }

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Publish status updated!');
    }

    /**
     * Bulk action for posts.
     */
    public function bulkAction(Request $request)
    {
        $request->validate([
            'post_ids' => 'required|array',
            'post_ids.*' => 'exists:posts,id',
            'action' => 'required|in:publish,unpublish,delete',
        ]);

        $postIds = $request->post_ids;

        switch ($request->action) {
            case 'publish':
                Post::whereIn('id', $postIds)->update([
                    'is_published' => true,
                    'status' => 'published',
                    'published_at' => now(),
                    'rejection_reason' => null,
                ]);
                break;

            case 'unpublish':
                Post::whereIn('id', $postIds)->update([
                    'is_published' => false,
                    'status' => 'draft',
                    'published_at' => null,
                ]);
                break;

            case 'delete':
                // Delete featured images first
                $posts = Post::whereIn('id', $postIds)->get();
                foreach ($posts as $post) {
                    if (
                        $post->featured_image &&
                        !filter_var($post->featured_image, FILTER_VALIDATE_URL)
                    ) {
                        Storage::disk('public')->delete($post->featured_image);
                    }
                }
                Post::whereIn('id', $postIds)->delete();
                break;
        }

        Cache::forget('posts:index');

        return redirect()
            ->route('admin.posts.index')
            ->with('success', 'Bulk action completed successfully!');
    }
}