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
        $array = [4, 5, 6, 7, 8];
        shuffle($array);
        return [
            'url' => fake()->url(),
            'title' => ucfirst(fake()->domainWord()),
            'order' => fake()->unique()->numberBetween(4,20),
            'has_child' =>0,
            'parent_id' => 0,
            'child' => array_slice($array, 0, 2)
        ];
    }
}
