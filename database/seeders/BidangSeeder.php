<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bidang;

class BidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('bidang')->truncate();

        $data = include database_path('seeders/demo/BidangDemoArray.php');
        \DB::table('bidang')->insert($data);

        $bidangs = Bidang::all();
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));
        $imageUrl = $faker->imageUrl(800, 600);

        foreach ($bidangs as $bidang) {
            $bidang->addMediaFromUrl($imageUrl)->toMediaCollection('bidang');
        }
    }
}
