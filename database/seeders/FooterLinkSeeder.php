<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('footer_links')->truncate();

        for ($i = 0; $i < 10; $i++) {
            \DB::table('footer_links')->insert([
                'title' => fake()->company(),
                'url' => fake()->url(),
            ]);
        }
    }
}
