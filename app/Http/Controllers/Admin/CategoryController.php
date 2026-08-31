<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories
     */
    public function index()
    {
        $categories = Category::withCount(['posts' => function ($query) {
            $query->whereNotNull('published_at');
        }])->orderBy('name')->paginate(15);

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created category
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'description' => 'nullable|string|max:500',
            'icon' => 'nullable|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // 5MB max
        ]);

        $category = Category::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'description' => $validated['description'] ?? null,
            'icon' => $validated['icon'] ?? '📂',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('categories', 'public');
            $category->image = $path;
            $category->save();
        }

        // Clear cache
        Cache::forget('categories:all');

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category created successfully!');
    }

    /**
     * Show the form for editing a category
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update a category
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|string|max:500',
            'icon' => 'nullable|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'remove_image' => 'nullable|boolean',
        ]);

        $category->name = $validated['name'];
        $category->slug = Str::slug($validated['name']);
        $category->description = $validated['description'] ?? null;
        $category->icon = $validated['icon'] ?? '📂';

        // Handle image
        if ($request->has('remove_image') && $category->image) {
            // Remove image
            if (Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }
            $category->image = null;
        } elseif ($request->hasFile('image')) {
            // Delete old image if exists
            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }
            $path = $request->file('image')->store('categories', 'public');
            $category->image = $path;
        }

        $category->save();

        // Clear cache
        Cache::forget('categories:all');

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category updated successfully!');
    }

    /**
     * Delete a category
     */
    public function destroy(Category $category)
    {
        // Check if category has posts
        if ($category->posts()->count() > 0) {
            return redirect()
                ->route('admin.categories.index')
                ->with('error', 'Cannot delete category with associated posts. Please reassign or delete the posts first.');
        }

        // Delete image if exists
        if ($category->image && Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        // Clear cache
        Cache::forget('categories:all');

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category deleted successfully!');
    }
}