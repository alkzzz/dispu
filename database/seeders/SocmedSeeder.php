<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocmedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('socmeds')->truncate();

        \DB::table('socmeds')->insert([
            ['name' => 'Facebook', 'link' => 'https://facebook.com/'],
            ['name' => 'Youtube', 'link' => 'https://youtube.com/'],
            ['name' => 'Instagram', 'link' => 'https://instagram.com/'],
        ]);
    }
}
