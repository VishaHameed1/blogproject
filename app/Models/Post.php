<?php

namespace App\Models;

use App\Observers\PostObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

#[ObservedBy([PostObserver::class])]
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'body',
        'excerpt',
        'featured_image',
        'featured_image_path',
        'status',
        'published_at',
        'category_id',
        'user_id',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function savedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'user_saved_posts',
            'post_id',
            'user_id'
        )->withTimestamps();
    }

    public function viewedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'post_user_history',
            'post_id',
            'user_id'
        )->withPivot('viewed_at')->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Get only published posts.
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    /**
     * Get only draft posts.
     */
    public function scopeDraft(Builder $query): Builder
    {
        return $query->where('status', 'draft');
    }

    /**
     * Get only scheduled posts.
     */
    public function scopeScheduled(Builder $query): Builder
    {
        return $query
            ->whereNotNull('published_at')
            ->where('published_at', '>', now());
    }

    /**
     * Get only pending posts.
     */
    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', 'pending');
    }

    /*
    |--------------------------------------------------------------------------
    | Image
    |--------------------------------------------------------------------------
    */

    /**
     * Get the featured image URL.
     *
     * Supports:
     * - posts/image.jpg
     * - storage/posts/image.jpg
     * - full http/https URLs
     */
    public function getFeaturedImageUrlAttribute(): ?string
    {
        /*
        |--------------------------------------------------------------------------
        | Preferred image path
        |--------------------------------------------------------------------------
        */

        if (!empty($this->featured_image_path)) {
            $path = trim($this->featured_image_path);
            $path = ltrim($path, '/');

            // Already contains storage/
            if (str_starts_with($path, 'storage/')) {
                return asset($path);
            }

            // Normal Laravel public storage path
            return asset('storage/' . $path);
        }

        /*
        |--------------------------------------------------------------------------
        | Legacy featured_image fallback
        |--------------------------------------------------------------------------
        */

        if (!empty($this->featured_image)) {
            $image = trim($this->featured_image);

            // Already a complete URL
            if (filter_var($image, FILTER_VALIDATE_URL)) {
                return $image;
            }

            $image = ltrim($image, '/');

            // Already contains storage/
            if (str_starts_with($image, 'storage/')) {
                return asset($image);
            }

            // Treat as a storage path
            return asset('storage/' . $image);
        }

        return null;
    }

    /*
    |--------------------------------------------------------------------------
    | Statistics
    |--------------------------------------------------------------------------
    */

    public function viewsCount(): int
    {
        return $this->viewedByUsers()->count();
    }

    /*
    |--------------------------------------------------------------------------
    | Status Helpers
    |--------------------------------------------------------------------------
    */

    public function isPublished(): bool
    {
        return !is_null($this->published_at)
            && $this->published_at <= now();
    }

    public function isScheduled(): bool
    {
        return !is_null($this->published_at)
            && $this->published_at > now();
    }

    public function isDraft(): bool
    {
        return $this->status === 'draft';
    }

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isRejected(): bool
    {
        return $this->status === 'rejected';
    }

    /*
    |--------------------------------------------------------------------------
    | Record View
    |--------------------------------------------------------------------------
    */

    /**
     * Record a view for this post by a user.
     */
    public function recordView(User $user): void
    {
        $this->viewedByUsers()->syncWithoutDetaching([
            $user->id => ['viewed_at' => now()]
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    /**
     * Get the post's reading time in minutes.
     */
    public function getReadTimeAttribute(): int
    {
        $content = $this->body ?? $this->content ?? '';
        $wordCount = str_word_count(strip_tags($content));
        return max(1, ceil($wordCount / 200));
    }

    /**
     * Get the post's excerpt.
     */
    public function getExcerptAttribute($value): string
    {
        if (!empty($value)) {
            return $value;
        }

        $content = $this->body ?? $this->content ?? '';
        return \Illuminate\Support\Str::limit(strip_tags($content), 150);
    }
}
