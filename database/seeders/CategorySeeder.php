<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('categories')->truncate();

        $data = include database_path('seeders/demo/CategoryDemoArray.php');
        \DB::table('categories')->insert($data);
    }
}
