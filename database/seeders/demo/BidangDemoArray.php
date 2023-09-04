<?php

use Carbon\Carbon;

$faker = \Faker\Factory::create();
$faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));
$imageUrl = $faker->imageUrl(800, 600);

return [
    [
        'title' => 'Bidang Sekretariat',
        'url' => route('frontend.getBidang', 'bidang-sekretariat'),
        'slug' => 'bidang-sekretariat',
        'description' => $faker->paragraph(5),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'title' => 'Bidang Bina Marga',
        'url' => route('frontend.getBidang', 'bidang-bina-marga'),
        'slug' => 'bidang-bina-marga',
        'description' => $faker->paragraph(5),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'title' => 'Bidang Tata Ruang',
        'url' => route('frontend.getBidang', 'bidang-tata-ruang'),
        'slug' => 'bidang-tata-ruang',
        'description' => $faker->paragraph(5),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'title' => 'Bidang Cipta Karya',
        'url' => route('frontend.getBidang', 'bidang-cipta-karya'),
        'slug' => 'bidang-cipta-karya',
        'description' => $faker->paragraph(5),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'title' => 'Bidang Pengembangan Konstruksi',
        'url' => route('frontend.getBidang', 'bidang-pengembangan-konstruksi'),
        'slug' => 'bidang-pengembangan-konstruksi',
        'description' => $faker->paragraph(5),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'title' => 'Bidang Sumber Daya Air',
        'url' => route('frontend.getBidang', 'bidang-sumber-daya-air'),
        'slug' => 'bidang-sumber-daya-air',
        'description' => $faker->paragraph(5),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
];
