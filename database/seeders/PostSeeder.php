<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('posts')->truncate();
        \DB::table('media')->truncate();

        $posts = \App\Models\Post::factory()->count(20)->create();

        $imageUrl = fake()->imageUrl(640, 480, null, false);

        foreach ($posts as $post) {
            $post->addMediaFromUrl($imageUrl)->toMediaCollection('berita');
        }
    }
}
