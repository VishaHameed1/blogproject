<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class PostObserver
{
    public function saved(Post $post): void
    {
        $this->clearCache($post);
    }

    public function deleted(Post $post): void
    {
        $this->clearCache($post);
    }

    protected function clearCache(Post $post): void
    {
        Cache::forget('posts:index');
        Cache::forget("posts:show:{$post->slug}");

        if ($post->category) {
            Cache::forget("posts:category:{$post->category->slug}");
        }
    }
}