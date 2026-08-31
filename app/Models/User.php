<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $role
 * @property int|null $role_id
 * @property string|null $avatar
 * @property string|null $bio
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property-read \App\Models\Role|null $roleRelation
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $posts
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $bookmarks
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $savedPosts
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Post> $readHistory
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /*
    |--------------------------------------------------------------------------
    | Mass Assignable
    |--------------------------------------------------------------------------
    */

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'role',
        'avatar',
        'bio',
    ];

    /*
    |--------------------------------------------------------------------------
    | Hidden Attributes
    |--------------------------------------------------------------------------
    */

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /*
    |--------------------------------------------------------------------------
    | Attribute Casts
    |--------------------------------------------------------------------------
    */

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Model Events
    |--------------------------------------------------------------------------
    */

    protected static function booted(): void
    {
        static::saved(function () {
            static::clearAppAndPageCaches();
        });

        static::deleted(function () {
            static::clearAppAndPageCaches();
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Cache
    |--------------------------------------------------------------------------
    */

    /**
     * Clear application and page caches.
     *
     * Note:
     * Cache::flush() clears the entire configured cache store.
     */
    protected static function clearAppAndPageCaches(): void
    {
        Cache::flush();
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * Get the user's role relationship.
     * 
     * Renamed to customRole() to prevent collision with Spatie's scopeRole() method.
     */
    public function customRole(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    /**
     * Get the user's role relationship (Alias for backwards compatibility).
     *
     * Uses:
     * users.role_id -> roles.id
     */
    public function roleRelation(): BelongsTo
    {
        return $this->customRole();
    }

    /**
     * Get all posts created by the user.
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    /**
     * Get user's saved/bookmarked posts.
     *
     * Pivot table:
     * post_user_bookmark
     */
    public function bookmarks(): BelongsToMany
    {
        return $this->belongsToMany(
            Post::class,
            'post_user_bookmark',
            'user_id',
            'post_id'
        )->withTimestamps();
    }

    /**
     * Alias for bookmarks() relationship method.
     */
    public function savedPosts(): BelongsToMany
    {
        return $this->bookmarks();
    }

    /**
     * Get user's reading history.
     *
     * Pivot table:
     * post_user_history
     */
    public function readHistory(): BelongsToMany
    {
        return $this->belongsToMany(
            Post::class,
            'post_user_history',
            'user_id',
            'post_id'
        )->withTimestamps();
    }

    /*
    |--------------------------------------------------------------------------
    | Role Helpers
    |--------------------------------------------------------------------------
    */

    /**
     * Check whether the user has a specific role.
     *
     * Compatible with Spatie Permission as well as custom role columns.
     */
    public function hasRole($roles, string $guard = null): bool
    {
        // Check Spatie Permission first
        try {
            if (parent::hasRole($roles, $guard)) {
                return true;
            }
        } catch (\Throwable $e) {
            // Fallthrough if Spatie role lookup fails
        }

        // Custom string check logic
        if (is_string($roles)) {
            $roleSlug = strtolower(trim($roles));

            /*
            | Direct role column
            */
            $rawRole = $this->getAttribute('role');

            if (
                is_string($rawRole) &&
                strtolower(trim($rawRole)) === $roleSlug
            ) {
                return true;
            }

            /*
            | Role relationship
            */
            if ($this->role_id) {
                $relatedRoleSlug = $this->roleRelation()
                    ->value('slug');

                if (
                    is_string($relatedRoleSlug) &&
                    strtolower(trim($relatedRoleSlug)) === $roleSlug
                ) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Check if the user is an administrator.
     */
    public function isAdmin(): bool
    {
        return $this->hasRole('admin');
    }

    /**
     * Check if the user is an editor.
     */
    public function isEditor(): bool
    {
        return $this->hasRole('editor');
    }

    /**
     * Check if the user is an author.
     */
    public function isAuthor(): bool
    {
        return $this->hasRole('author');
    }

    /**
     * Check if the user is a normal user.
     */
    public function isUser(): bool
    {
        return $this->hasRole('user');
    }

    /**
     * Check if the user is a subscriber.
     */
    public function isSubscriber(): bool
    {
        return $this->hasRole('subscriber');
    }

    /**
     * Check if the user is a normal registered user.
     *
     * Supports:
     * user
     * subscriber
     */
    public function isRegularUser(): bool
    {
        return $this->isUser()
            || $this->isSubscriber();
    }

    /*
    |--------------------------------------------------------------------------
    | Post Permissions
    |--------------------------------------------------------------------------
    */

    /**
     * Check whether the user can publish posts.
     *
     * Admin and Editor can publish.
     */
    public function canPublish(): bool
    {
        return $this->isAdmin()
            || $this->isEditor();
    }

    /**
     * Check whether the user can create posts.
     *
     * Admin, Editor and Author can create.
     */
    public function canCreatePost(): bool
    {
        return $this->isAdmin()
            || $this->isEditor()
            || $this->isAuthor();
    }

    /**
     * Check whether the user can edit a specific post.
     *
     * Admin and Editor:
     * - Can edit any post.
     *
     * Author:
     * - Can edit only their own post.
     */
    public function canEditPost(Post $post): bool
    {
        if ($this->isAdmin() || $this->isEditor()) {
            return true;
        }

        return $this->isAuthor()
            && (int) $post->user_id === (int) $this->id;
    }

    /**
     * Check whether the user can delete a specific post.
     *
     * Admin and Editor:
     * - Can delete any post.
     *
     * Author:
     * - Can delete only their own post.
     */
    public function canDeletePost(Post $post): bool
    {
        if ($this->isAdmin() || $this->isEditor()) {
            return true;
        }

        return $this->isAuthor()
            && (int) $post->user_id === (int) $this->id;
    }

    /*
    |--------------------------------------------------------------------------
    | User Information
    |--------------------------------------------------------------------------
    */

    /**
     * Get user's full name.
     */
    public function getFullNameAttribute(): string
    {
        return $this->name;
    }

    /**
     * Get user's initials.
     *
     * Example: John Doe => JD
     */
    public function getInitialsAttribute(): string
    {
        $words = preg_split(
            '/\s+/',
            trim($this->name)
        );

        $initials = '';

        foreach ($words as $word) {
            if (!empty($word)) {
                $initials .= strtoupper(
                    substr($word, 0, 1)
                );
            }
        }

        return substr($initials, 0, 2);
    }

    /**
     * Get user's avatar URL.
     */
    public function getAvatarUrlAttribute(): ?string
    {
        if ($this->avatar) {
            // Check if it's a full URL (external avatar)
            if (filter_var($this->avatar, FILTER_VALIDATE_URL)) {
                return $this->avatar;
            }
            return asset('storage/' . $this->avatar);
        }
        return null;
    }

    /**
     * Check if user has avatar.
     */
    public function hasAvatar(): bool
    {
        return !empty($this->avatar);
    }

    /*
    |--------------------------------------------------------------------------
    | Role Information
    |--------------------------------------------------------------------------
    */

    /**
     * Check whether the user has any role.
     */
    public function hasAnyRole(...$roles): bool
    {
        try {
            if (!empty($roles) && parent::hasAnyRole(...$roles)) {
                return true;
            }
        } catch (\Throwable $e) {
            // Fallthrough to custom checks
        }

        /*
        | Direct role column
        */
        $rawRole = $this->getAttribute('role');

        if (
            is_string($rawRole) &&
            !empty(trim($rawRole))
        ) {
            return true;
        }

        /*
        | Role relationship
        */
        if ($this->role_id) {
            return $this->roleRelation()->exists();
        }

        return false;
    }

    /**
     * Get readable role name.
     *
     * Examples: author => Author, admin => Admin, user => User
     */
    public function getRoleNameAttribute(): string
    {
        // Spatie Role Check
        if (method_exists($this, 'getRoleNames')) {
            $spatieRole = $this->getRoleNames()->first();
            if ($spatieRole) {
                return ucfirst($spatieRole);
            }
        }

        /*
        | Direct role column
        */
        $rawRole = $this->getAttribute('role');

        if (
            is_string($rawRole) &&
            !empty(trim($rawRole))
        ) {
            return ucfirst(trim($rawRole));
        }

        /*
        | Role relationship
        */
        if ($this->role_id) {
            $roleName = $this->roleRelation()
                ->value('name');

            if ($roleName) {
                return $roleName;
            }

            $roleSlug = $this->roleRelation()
                ->value('slug');

            if ($roleSlug) {
                return ucfirst($roleSlug);
            }
        }

        return 'No Role';
    }

    /**
     * Get role slug.
     *
     * Examples: admin, author, user
     */
    public function getRoleSlugAttribute(): ?string
    {
        // Spatie Role Check
        if (method_exists($this, 'getRoleNames')) {
            $spatieRole = $this->getRoleNames()->first();
            if ($spatieRole) {
                return strtolower(trim($spatieRole));
            }
        }

        /*
        | Direct role column
        */
        $rawRole = $this->getAttribute('role');

        if (
            is_string($rawRole) &&
            !empty(trim($rawRole))
        ) {
            return strtolower(trim($rawRole));
        }

        /*
        | Role relationship
        */
        if ($this->role_id) {
            $roleSlug = $this->roleRelation()
                ->value('slug');

            if ($roleSlug) {
                return strtolower(trim($roleSlug));
            }
        }

        return null;
    }

    /*
    |--------------------------------------------------------------------------
    | Dashboard Permissions
    |--------------------------------------------------------------------------
    */

    /**
     * Check if user can access the author dashboard.
     */
    public function canAccessAuthorDashboard(): bool
    {
        return $this->isAuthor()
            || $this->isAdmin();
    }

    /**
     * Check if user can access the admin dashboard.
     */
    public function canAccessAdminDashboard(): bool
    {
        return $this->isAdmin();
    }

    /**
     * Get dashboard route according to user's role.
     */
    public function dashboardRoute(): string
    {
        if ($this->isAdmin()) {
            return 'admin.dashboard';
        }

        if ($this->isAuthor()) {
            return 'author.dashboard';
        }

        return 'dashboard';
    }

    /*
    |--------------------------------------------------------------------------
    | Additional Helper Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Get the number of posts created by the user.
     */
    public function getPostCountAttribute(): int
    {
        return $this->posts()->count();
    }

    /**
     * Get the number of published posts created by the user.
     */
    public function getPublishedPostCountAttribute(): int
    {
        return $this->posts()
            ->where('is_published', true)
            ->count();
    }

    /**
     * Get the number of pending posts created by the user.
     */
    public function getPendingPostCountAttribute(): int
    {
        return $this->posts()
            ->where('status', 'pending')
            ->count();
    }

    /**
     * Get the number of draft posts created by the user.
     */
    public function getDraftPostCountAttribute(): int
    {
        return $this->posts()
            ->where('status', 'draft')
            ->orWhere('is_published', false)
            ->count();
    }

    /**
     * Check if user can access a specific dashboard.
     */
    public function canAccessDashboard(string $dashboard): bool
    {
        return match ($dashboard) {
            'admin' => $this->canAccessAdminDashboard(),
            'author' => $this->canAccessAuthorDashboard(),
            default => false,
        };
    }
}