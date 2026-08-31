<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->unique()->sentence(6);

        return [
            'category_id' => Category::factory(),
            'title' => rtrim($title, '.'),
            'slug' => Str::slug($title),
            'body' => implode("\n\n", fake()->paragraphs(6)),
            'published_at' => fake()->boolean(80)
                ? fake()->dateTimeBetween('-6 months', 'now')
                : null,
        ];
    }

    // Convenience state for explicitly drafted posts
    public function draft(): static
    {
        return $this->state(fn () => ['published_at' => null]);
    }

    // Convenience state for explicitly published posts
    public function published(): static
    {
        return $this->state(fn () => ['published_at' => fake()->dateTimeBetween('-6 months', 'now')]);
    }
}