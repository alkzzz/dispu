<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('posts')->truncate();

        \DB::table('posts')->insert([
            'title' => 'Home',
            'slug' => 'home',
            'content' => 'Statistik Website',
            'hidden' => true,
            'created_at' => new Carbon('2000-01-01'),
        ]);

        $posts = \App\Models\Post::factory()->count(20)->create();

        // $faker = \Faker\Factory::create();
        // $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));
        // $imageUrl = $faker->imageUrl(800, 600);

        // foreach ($posts as $post) {
        //     $post->addMediaFromUrl($imageUrl)->toMediaCollection('berita');
        // }
    }
}
