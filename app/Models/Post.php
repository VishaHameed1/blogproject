<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'body',
        'featured_image',
        'category_id',
        'published_at',
        'is_published',
        'status',
        'rejection_reason',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_published' => 'boolean',
    ];

    /**
     * Scope: published posts only.
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query
            ->where('is_published', true)
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    /**
     * Scope: search posts by title, body, or category.
     */
    public function scopeSearch(Builder $query, ?string $term): Builder
    {
        $term = trim((string) $term);

        if ($term === '') {
            return $query;
        }

        return $query->where(function (Builder $q) use ($term) {
            $q->where('title', 'like', "%{$term}%")
                ->orWhere('body', 'like', "%{$term}%")
                ->orWhereHas('category', function (Builder $categoryQuery) use ($term) {
                    $categoryQuery->where(
                        'name',
                        'like',
                        "%{$term}%"
                    );
                });
        });
    }

    /**
     * Bootstrap model events.
     */
    protected static function booted(): void
    {
        static::saved(function (Post $post) {
            static::clearPostCaches($post);
        });

        static::deleted(function (Post $post) {
            static::clearPostCaches($post);
        });
    }

    /**
     * Clear post-related caches.
     */
    protected static function clearPostCaches(Post $post): void
    {
        Cache::forget('posts:index');

        if (!empty($post->slug)) {
            Cache::forget("posts:show:{$post->slug}");
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * Post category.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(
            Category::class,
            'category_id'
        );
    }

    /**
     * User who created the post.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'user_id'
        );
    }

    /**
     * Post author.
     *
     * Allows:
     *
     * $post->author
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'user_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Featured Image
    |--------------------------------------------------------------------------
    */

    /**
     * Get the featured image URL.
     *
     * Usage:
     *
     * $post->featured_image_url
     */
    public function getFeaturedImageUrlAttribute(): string
    {
        /*
         * No image.
         */
        if (empty($this->featured_image)) {
            return $this->getPlaceholderImage();
        }

        /*
         * Already a full URL.
         */
        if (filter_var(
            $this->featured_image,
            FILTER_VALIDATE_URL
        )) {
            return $this->featured_image;
        }

        /*
         * Check the public storage disk.
         */
        return asset('storage/' . ltrim($this->featured_image, '/'));

        /*
         * File does not exist.
         */
        return $this->getPlaceholderImage();
    }

    /**
     * Generate placeholder image.
     */
    private function getPlaceholderImage(): string
    {
        $text = urlencode(
            substr(
                $this->title ?? 'Post',
                0,
                20
            )
        );

        return "https://placehold.co/600x400/FAFAF7/C08A2E?text={$text}";
    }

    /**
     * Check whether a featured image exists.
     */
    public function hasFeaturedImage(): bool
    {
        if (empty($this->featured_image)) {
            return false;
        }

        /*
         * External image URL.
         */
        if (filter_var(
            $this->featured_image,
            FILTER_VALIDATE_URL
        )) {
            return true;
        }

        /*
         * Local storage image.
         */
        return Storage::disk('public')->exists(
            $this->featured_image
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Reading Time
    |--------------------------------------------------------------------------
    */

    /**
     * Estimated reading time in minutes.
     */
    public function getReadTimeAttribute(): int
    {
        $words = str_word_count(
            strip_tags($this->body ?? '')
        );

        return max(
            1,
            (int) ceil($words / 200)
        );
    }
}