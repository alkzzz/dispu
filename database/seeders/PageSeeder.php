<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('pages')->truncate();

        // Page::factory()->count(4)->create();
        $data = include database_path('seeders/demo/PageDemoArray.php');
        \DB::table('pages')->insert($data);
        // Page::create($data);
    }
}
