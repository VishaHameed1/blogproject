<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'image',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get the post count for this category
     */
    public function getPostCountAttribute(): int
    {
        return $this->posts()->whereNotNull('published_at')->count();
    }

    /**
     * Get the category image URL
     */
    public function getImageUrlAttribute(): ?string
    {
        if (empty($this->image)) {
            return null;
        }

        if (Storage::disk('public')->exists($this->image)) {
            return Storage::url($this->image);
        }

        return null;
    }

    /**
     * Check if category has an image
     */
    public function hasImage(): bool
    {
        return !empty($this->image);
    }

    /**
     * Boot the model
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });

        static::updating(function ($category) {
            if ($category->isDirty('name') && empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });

        // Clear application cache automatically whenever a category is saved or updated
        static::saved(function () {
            static::clearAppAndPageCaches();
        });

        // Delete image and clear caches when category is deleted
        static::deleting(function ($category) {
            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }
        });

        static::deleted(function () {
            static::clearAppAndPageCaches();
        });
    }

    /**
     * Automate clearing of application cache.
     */
    protected static function clearAppAndPageCaches(): void
    {
        Cache::flush();
    }
}