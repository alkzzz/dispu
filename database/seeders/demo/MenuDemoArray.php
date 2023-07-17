<?php
return [
    [
        'title' => 'Home',
        'url' => route('index'),
        'order' => 1,
        'type' => null,
        'type_id' => 0,
        'has_child' => 0,
        'parent_id' => 0,
        'child' => null,
    ],
    [
        'title' => 'Berita',
        'url' => route('berita'),
        'order' => 2,
        'type' => null,
        'type_id' => 0,
        'has_child' => 0,
        'parent_id' => 0,
        'child' => null,
    ],
    [
        'title' => 'Galeri',
        'url' => route('galeri'),
        'order' => 3,
        'type' => null,
        'type_id' => 0,
        'has_child' => 0,
        'parent_id' => 0,
        'child' => null,
    ],
    [
        'title' => 'Profil',
        'url' => '#',
        'order' => 4,
        'type' => 'page',
        'type_id' => 1,
        'has_child' => 1,
        'parent_id' => 0,
        'child' => json_encode([5, 6, 7, 8])
    ],
    [
        'title' => 'Gambaran Umum',
        'url' => route('frontend.getPage', 'gambaran-umum'),
        'type' => 'page',
        'type_id' => 2,
        'order' => 99,
        'has_child' => 0,
        'parent_id' => 4,
        'child' => null
    ],
    [
        'title' => 'Visi Misi',
        'url' => route('frontend.getPage', 'visi-misi'),
        'type' => 'page',
        'type_id' => 3,
        'order' => 99,
        'has_child' => 0,
        'parent_id' => 4,
        'child' => null
    ],
    [
        'title' => 'Struktur Organisasi',
        'url' => route('frontend.getPage', 'struktur-organisasi'),
        'type' => 'page',
        'type_id' => 4,
        'order' => 99,
        'has_child' => 0,
        'parent_id' => 4,
        'child' => null
    ],
    [
        'title' => 'Sambutan Kepala Dinas',
        'url' => route('frontend.getPage', 'sambutan-kepala-dinas'),
        'type' => 'page',
        'type_id' => 5,
        'order' => 99,
        'has_child' => 0,
        'parent_id' => 4,
        'child' => null
    ],
];
