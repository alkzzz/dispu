<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gallery>
 */
class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $banjarbaru = ['Banjarbaru Selatan', 'Banjarbaru Utara', 'Cempaka', 'Landasan Ulin', 'Liang Anggang'];
        return [
            'title' => ucwords(fake()->sentence(6)),
            'location' => fake()->randomElement($banjarbaru),
        ];
    }
}
