<?php

use Carbon\Carbon;

$faker = \Faker\Factory::create();
$faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));
$imageUrl = $faker->imageUrl(800, 600);

return [
    [
        'title' => 'Sekretariat',
        'url' => route('frontend.getBidang', 'sekretariat'),
        'slug' => 'sekretariat',
        'description' => $faker->paragraph(5),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'title' => 'Bina Marga',
        'url' => route('frontend.getBidang', 'bina-marga'),
        'slug' => 'bina-marga',
        'description' => $faker->paragraph(5),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'title' => 'Tata Ruang',
        'url' => route('frontend.getBidang', 'tata-ruang'),
        'slug' => 'tata-ruang',
        'description' => $faker->paragraph(5),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'title' => 'Cipta Karya',
        'url' => route('frontend.getBidang', 'cipta-karya'),
        'slug' => 'cipta-karya',
        'description' => $faker->paragraph(5),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'title' => 'Pengembangan Konstruksi',
        'url' => route('frontend.getBidang', 'pengembangan-konstruksi'),
        'slug' => 'pengembangan-konstruksi',
        'description' => $faker->paragraph(5),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'title' => 'Sumber Daya Air',
        'url' => route('frontend.getBidang', 'sumber-daya-air'),
        'slug' => 'sumber-daya-air',
        'description' => $faker->paragraph(5),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
];
