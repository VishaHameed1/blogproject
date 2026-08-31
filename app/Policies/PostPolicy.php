<?php

// app/Policies/PostPolicy.php
namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    /**
     * Perform pre-authorization checks (Admins and Editors override all checks).
     */
    public function before(User $user, string $ability): ?bool
    {
        if ($user->isAdmin() || $user->isEditor()) {
            return true;
        }

        return null;
    }

    public function update(User $user, Post $post): bool
    {
        return $user->isAuthor() && $post->user_id === $user->id;
    }

    public function delete(User $user, Post $post): bool
    {
        return $user->isAuthor() && $post->user_id === $user->id;
    }
}