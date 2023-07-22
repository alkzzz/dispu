<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => ucwords(fake()->sentence(6)),
            'content' => ucwords(fake()->paragraphs(15, true)),
            'featured' => rand(0, 1),
            'created_at' => now()->subDays(rand(0, 10))
        ];
    }
}
