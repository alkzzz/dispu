<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('menus')->truncate();

        \DB::table('menus')->insert([
            ['title' => 'Home', 'order' => 1, 'url' => route('index')],
            ['title' => 'Berita', 'order' => 2, 'url' => route('berita')],
            ['title' => 'Galeri', 'order' => 3, 'url' => route('galeri')],
        ]);

        \App\Models\Menu::factory()->count(5)->create();
    }
}
