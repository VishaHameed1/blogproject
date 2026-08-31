<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    /**
     * Display a listing of all categories.
     */
    public function index()
    {
        $categories = Cache::remember('categories:with_count', 3600, function () {
            return Category::withCount(['posts' => function ($query) {
                $query->whereNotNull('published_at');
            }])->orderBy('name')->get();
        });

        return view('posts.categories', compact('categories'));
    }
}