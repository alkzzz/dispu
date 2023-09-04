<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LinkIconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('link_icons')->truncate();

        $linkicons = \App\Models\LinkIcon::factory()->count(10)->create();

        // $faker = \Faker\Factory::create();
        // $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));
        // $imageUrl = $faker->imageUrl(800, 600);

        // foreach ($linkicons as $linkicon) {
        //     $linkicon->addMediaFromUrl($imageUrl)->toMediaCollection('link-icon');
        // }
    }
}
