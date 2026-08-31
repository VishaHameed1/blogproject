<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostModerationController extends Controller
{
    public function index()
    {
        $pendingPosts = Post::where('status', 'pending')
            ->with(['author', 'category'])
            ->latest()
            ->paginate(15);

        return view('admin.moderation.index', compact('pendingPosts'));
    }

    public function approve(Post $post)
    {
        $post->update([
            'status' => 'published',
            'is_published' => true,
            'published_at' => now(),
            'rejection_reason' => null,
        ]);

        return redirect()->back()->with('success', 'Post approved and published live!');
    }

    public function reject(Request $request, Post $post)
    {
        $request->validate([
            'rejection_reason' => 'required|string|max:500',
        ]);

        $post->update([
            'status' => 'rejected',
            'is_published' => false,
            'rejection_reason' => $request->rejection_reason,
        ]);

        return redirect()->back()->with('success', 'Post rejected and sent back with feedback.');
    }
}