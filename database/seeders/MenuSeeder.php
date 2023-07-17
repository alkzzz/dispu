<?php

namespace Database\Seeders;

include database_path('seeders/demo/MenuDemoArray.php');

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('menus')->truncate();

        $data = include database_path('seeders/demo/MenuDemoArray.php');

        \DB::table('menus')->insert($data);

        // \App\Models\Menu::factory()->count(5)->create();
    }
}
