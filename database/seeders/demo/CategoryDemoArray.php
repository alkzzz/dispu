<?php

use Carbon\Carbon;

return [
    [
        'title' => 'Sekretariat',
        'url' => route('frontend.getCategory', 'sekretariat'),
        'slug' => 'sekretariat',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'title' => 'Bina Marga',
        'url' => route('frontend.getCategory', 'bina-marga'),
        'slug' => 'bina-marga',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'title' => 'Tata Ruang',
        'url' => route('frontend.getCategory', 'tata-ruang'),
        'slug' => 'tata-ruang',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'title' => 'Cipta Karya',
        'url' => route('frontend.getCategory', 'cipta-karya'),
        'slug' => 'cipta-karya',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'title' => 'Pengembangan Konstruksi',
        'url' => route('frontend.getCategory', 'pengembangan-konstruksi'),
        'slug' => 'pengembangan-konstruksi',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'title' => 'Sumber Daya Air',
        'url' => route('frontend.getCategory', 'sumber-daya-air'),
        'slug' => 'sumber-daya-air',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
];
