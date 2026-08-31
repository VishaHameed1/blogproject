<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserActivityController extends Controller
{
    /**
     * Display saved / bookmarked posts.
     */
    public function savedPosts(): View
    {
        /** @var User $user */
        $user = Auth::user();

        $posts = $user
            ->bookmarks()
            ->with([
                'category',
                'user',
            ])
            ->orderByPivot('created_at', 'desc')
            ->paginate(10);

        return view('users.saved', compact('posts'));
    }

    /**
     * Add or remove a bookmark.
     */
    public function toggleBookmark(Post $post): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        $user->bookmarks()->toggle($post->id);

        return back();
    }

    /**
     * Display reading history.
     */
    public function history(): View
    {
        /** @var User $user */
        $user = Auth::user();

        $history = $user
            ->readHistory()
            ->with([
                'category',
                'user',
            ])
            ->orderByPivot('updated_at', 'desc')
            ->paginate(10);

        return view('users.history', compact('history'));
    }

    /**
     * Clear reading history.
     */
    public function clearHistory(): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        $user->readHistory()->detach();

        return back()->with(
            'status',
            'Reading history cleared successfully.'
        );
    }
}