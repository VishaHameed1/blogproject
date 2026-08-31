<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // Get real data from database
        $totalPosts = Post::whereNotNull('published_at')->count();
        $totalCategories = Category::count();
        $totalContributors = User::whereNotNull('role_id')->count();
        $totalReaders = $totalPosts * 100; // Estimate: 100 readers per post

        // Get recent posts for featured section
        $recentPosts = Post::with('category')
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->take(3)
            ->get();

        // Get contributors (users with roles) using customRole to avoid Spatie conflict
        $contributors = User::with('customRole')
            ->whereNotNull('role_id')
            ->take(6)
            ->get();

        return view('about', compact(
            'totalPosts', 
            'totalCategories', 
            'totalContributors', 
            'totalReaders',
            'recentPosts',
            'contributors'
        ));
    }
}