<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the author dashboard.
     */
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        // Get user's posts with pagination
        $posts = $user->posts()
            ->with('category')
            ->latest()
            ->paginate(10);

        // Calculate stats
        $stats = [
            'total' => $user->posts()->count(),
            'published' => $user->posts()->where('status', 'published')->count(),
            'pending' => $user->posts()->where('status', 'pending')->count(),
            'draft' => $user->posts()->where('status', 'draft')->count(),
        ];

        // Recent activity - latest 5 posts
        $recentActivity = $user->posts()
            ->with('category')
            ->latest()
            ->take(5)
            ->get();

        return view('author.dashboard', compact('posts', 'stats', 'recentActivity'));
    }
}