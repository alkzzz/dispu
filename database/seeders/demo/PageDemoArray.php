<?php

use Carbon\Carbon;

return [
    [
        'title' => 'Profil',
        'slug' => 'profil',
        'url' => '#',
        'content' => 'Isi Halaman Profil',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'title' => 'Gambaran Umum',
        'slug' => 'gambaran-umum',
        'url' => route('frontend.getPage', 'gambaran-umum'),
        'content' => 'Isi Halaman Gambaran Umum',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'title' => 'Visi Misi',
        'slug' => 'visi-misi',
        'url' => route('frontend.getPage', 'visi-misi'),
        'content' => 'Isi Halaman Visi Misi',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'title' => 'Struktur Organisasi',
        'slug' => 'struktur-organisasi',
        'url' => route('frontend.getPage', 'struktur-organisasi'),
        'content' => 'Isi Halaman Struktur Organisasi',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'title' => 'Sambutan Kepala Dinas',
        'slug' => 'sambutan-kepala-dinas',
        'url' => route('frontend.getPage', 'sambutan-kepala-dinas'),
        'content' =>
        '<p style="text-align: justify; ">Assalamualaikum wr.wb.</p> <p style="text-align: justify; ">Selamat datang di Website resmi Dinas Pekerjaan Umum dan Penataan Ruang Kota Banjarbaru. Kami bersyukur kepada Allah SWT atas karunia dan hidayah-Nya, serta atas izin-Nya dan dukungan dari keluarga besar Dinas Pekerjaan Umum dan Penataan Ruang Kota Banjarbaru, website Dinas telah berhasil diperbaharui.</p> <p style="text-align: justify;">Website ini memiliki peranan yang sangat penting dalam upaya kami untuk meningkatkan pelayanan publik terkait penyediaan data dan informasi di sektor Pekerjaan Umum dan Perumahan di Kota Banjarbaru. Melalui website ini, kami bertekad untuk memfasilitasi akses yang mudah bagi penduduk Banjarbaru dalam memperoleh berbagai informasi terkait Pekerjaan Umum dan Perumahan, yang menjadi perhatian utama pemerintah.</p> <p style="text-align: justify;">Kehadiran website ini memiliki tujuan utama untuk selalu beradaptasi dengan perubahan dan kebutuhan yang terus berkembang dalam bidang Pekerjaan Umum dan Perumahan.</p> <p style="text-align: justify;">Kami berkomitmen untuk secara konsisten menyediakan data dan informasi terkait program dan kebijakan Pemerintah Kota Banjarbaru di bidang Pekerjaan Umum dan Perumahan, yang memberikan dampak yang merata dan luas bagi masyarakat.</p> <p style="text-align: justify;">Dalam semangat transparansi, kami berharap website ini dapat menjadi pusat komunikasi dan informasi yang dapat diandalkan antara Dinas PUPR Kota Banjarbaru dan masyarakat. Kami ingin memastikan bahwa akses terhadap informasi yang jelas, terpercaya, dan terkini merupakan hak yang dapat dinikmati oleh setiap warga Banjarbaru.</p> <p style="text-align: justify;">Kami mengundang Anda untuk menjelajahi dan memanfaatkan berbagai fitur yang tersedia di website ini. Dengan demikian, kami berharap bahwa website ini akan menjadi sumber informasi yang bermanfaat bagi Anda dalam mengikuti perkembangan Pekerjaan Umum dan Perumahan di Kota Banjarbaru.</p> <p style="text-align: justify;">Terima kasih atas perhatian dan partisipasi Anda dalam memanfaatkan website resmi Dinas Pekerjaan Umum dan Perumahan Rakyat Kota Banjarbaru. Bersama-sama, marilah kita berkomitmen untuk memajukan sektor Pekerjaan Umum dan Perumahan demi terwujudnya lingkungan yang lebih baik dan berkualitas bagi masyarakat Kota Banjarbaru.</p> <p style="text-align: justify;">Salam hormat,</p> <p style="text-align: justify;">Kepala Dinas PUPR Kota Banjarbaru,</p> <p style="text-align: justify;">Eka Yuliesda Akbari, ST, MT</p>',

        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'title' => 'Bidang Organisasi',
        'slug' => 'bidang-organisasi',
        'url' => '#',
        'content' => 'Isi Halaman Bidang Organisasi',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
    [
        'title' => 'Kontak',
        'slug' => 'kontak',
        'url' => '#',
        'content' => 'Isi Halaman Kontak',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ],
];
