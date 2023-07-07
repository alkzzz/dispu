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

        \App\Models\Menu::factory()->count(5)->create();

        // \App\Models\Model::factory()->create([
        //     'name' => 'Super Admin',
        //     'username' => 'superadmin',
        //     'email' => 'super@admin.com',
        //     'password' => bcrypt('123456')
        // ]);
    }
}
