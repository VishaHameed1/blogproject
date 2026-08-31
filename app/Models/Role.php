<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class Role extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    /**
     * Bootstrap model event listeners to automate cache clearing.
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

    /**
     * Automate clearing of application cache.
     */
    protected static function clearAppAndPageCaches(): void
    {
        Cache::flush();
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}