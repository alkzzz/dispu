<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('galleries')->truncate();

        $galleries = \App\Models\Gallery::factory()->count(20)->create();

        // $faker = \Faker\Factory::create();
        // $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));
        // $imageUrl = $faker->imageUrl(800, 600);

        // foreach ($galleries as $galeri) {
        //     $galeri->addMediaFromUrl($imageUrl)->toMediaCollection('galeri');
        // }
    }
}
