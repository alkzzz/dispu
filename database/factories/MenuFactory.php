<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'url' => fake()->url(),
            'title' => ucfirst(fake()->domainWord()),
            'order' => fake()->unique()->numberBetween(4,20),
            'parent_id' => rand(0,13)
        ];
    }
}
