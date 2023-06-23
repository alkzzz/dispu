<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoryPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $category_ids = Category::pluck('id');
        // $post_ids = Post::pluck('id');

        return [
            'category_id' => rand(1, 5),
            'post_id' => rand(1, 10),
        ];
    }
}