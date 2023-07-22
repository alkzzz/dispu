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
        \DB::table('media')->truncate();

        \DB::table('posts')->insert([
            'title' => 'Home',
            'slug' => 'home',
            'content' => 'Statistik Website',
            'hidden' => true,
            'created_at' => new Carbon('2000-01-01'),
        ]);

        $posts = \App\Models\Post::factory()->count(20)->create();

        $imageUrl = fake()->imageUrl(640, 480, null, false);

        foreach ($posts as $post) {
            $post->addMediaFromUrl($imageUrl)->toMediaCollection('berita');
        }
    }
}
