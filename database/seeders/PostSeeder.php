<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        Category::all()->each(function (Category $category) {
            Post::factory()
                ->count(5)
                ->for($category)
                ->create();
        });
    }
}