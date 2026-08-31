<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AuthorPostController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', Auth::id())
            ->with('category')
            ->latest()
            ->paginate(10);

        return view('author.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('author.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Match admin validation exactly
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'body' => 'required|string',
            'image_upload' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'action' => 'required|in:draft,submit',
        ]);

        $status = $validated['action'] === 'submit' ? 'pending' : 'draft';

        // Create post (matching admin style)
        $post = new Post();
        $post->user_id = Auth::id();
        $post->category_id = $validated['category_id'];
        $post->title = $validated['title'];
        $post->slug = Str::slug($validated['title']) . '-' . Str::random(6);
        $post->body = $validated['body'];
        $post->status = $status;
        $post->is_published = false;
        $post->published_at = null;

        // Handle image - EXACTLY like admin
        if ($request->hasFile('image_upload')) {
            $path = $request->file('image_upload')->store('posts', 'public');
            $post->featured_image = $path;
        }

        $post->save();

        $message = $status === 'pending' 
            ? 'Post submitted for admin review!' 
            : 'Draft saved successfully!';

        return redirect()
            ->route('author.dashboard')
            ->with('success', $message);
    }

    public function edit(Post $post)
    {
        abort_unless($post->user_id === Auth::id(), 403);
        $categories = Category::orderBy('name')->get();
        return view('author.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        abort_unless($post->user_id === Auth::id(), 403);

        // Match admin validation exactly
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'body' => 'required|string',
            'image_upload' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'remove_image' => 'nullable|boolean',
            'action' => 'required|in:draft,submit',
        ]);

        $status = $validated['action'] === 'submit' ? 'pending' : 'draft';

        // Update basic info (matching admin style)
        $post->title = $validated['title'];
        $post->body = $validated['body'];
        $post->category_id = $validated['category_id'];
        $post->slug = Str::slug($validated['title']) . '-' . Str::random(6);
        $post->status = $status;
        $post->is_published = false;
        $post->published_at = null;
        $post->rejection_reason = null;

        // Handle image - EXACTLY like admin
        if ($request->boolean('remove_image') && $post->featured_image) {
            if (!filter_var($post->featured_image, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete($post->featured_image);
            }
            $post->featured_image = null;
        } elseif ($request->hasFile('image_upload')) {
            if ($post->featured_image && !filter_var($post->featured_image, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete($post->featured_image);
            }
            $path = $request->file('image_upload')->store('posts', 'public');
            $post->featured_image = $path;
        }

        $post->save();

        $message = $status === 'pending' 
            ? 'Post updated and submitted for admin review!' 
            : 'Draft updated successfully!';

        return redirect()
            ->route('author.dashboard')
            ->with('success', $message);
    }

    public function destroy(Post $post)
    {
        abort_unless($post->user_id === Auth::id(), 403);

        if ($post->featured_image && !filter_var($post->featured_image, FILTER_VALIDATE_URL)) {
            Storage::disk('public')->delete($post->featured_image);
        }

        $post->delete();

        return redirect()
            ->route('author.dashboard')
            ->with('success', 'Post deleted successfully!');
    }
}