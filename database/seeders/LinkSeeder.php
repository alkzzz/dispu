<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Link;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('links')->truncate();

        for ($i=0; $i < 5; $i++) {
            Link::create([
                'name' => fake()->city(),
                'url' => fake()->url(),
            ]);
        }

    }
}
