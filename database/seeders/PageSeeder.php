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

        Page::factory()->count(4)->create();

        Page::create([
            'title' => 'Sambutan Kepala Dinas',
            'url' => url('sambutan-kepala-dinas'),
            'content' =>
            'Assalamualaikum wr.wb.

            <p>Selamat datang di Website resmi Dinas Pekerjaan Umum dan Penataan Ruang Kota Banjarbaru. Kami bersyukur kepada Allah SWT atas karunia dan hidayah-Nya, serta atas izin-Nya dan dukungan dari keluarga besar Dinas Pekerjaan Umum dan Penataan Ruang Kota Banjarbaru, website Dinas telah berhasil diperbaharui.</p>

            <p>Website ini memiliki peranan yang sangat penting dalam upaya kami untuk meningkatkan pelayanan publik terkait penyediaan data dan informasi di sektor Pekerjaan Umum dan Perumahan di Kota Banjarbaru. Melalui website ini, kami bertekad untuk memfasilitasi akses yang mudah bagi penduduk Banjarbaru dalam memperoleh berbagai informasi terkait Pekerjaan Umum dan Perumahan, yang menjadi perhatian utama pemerintah.</p>

            <p>Kehadiran website ini memiliki tujuan utama untuk selalu beradaptasi dengan perubahan dan kebutuhan yang terus berkembang dalam bidang Pekerjaan Umum dan Perumahan.</p>

            <p>Kami berkomitmen untuk secara konsisten menyediakan data dan informasi terkait program dan kebijakan Pemerintah Kota Banjarbaru di bidang Pekerjaan Umum dan Perumahan, yang memberikan dampak yang merata dan luas bagi masyarakat.</p>

            <p>Dalam semangat transparansi, kami berharap website ini dapat menjadi pusat komunikasi dan informasi yang dapat diandalkan antara Dinas PUPR Kota Banjarbaru dan masyarakat. Kami ingin memastikan bahwa akses terhadap informasi yang jelas, terpercaya, dan terkini merupakan hak yang dapat dinikmati oleh setiap warga Banjarbaru.</p>

            <p>Kami mengundang Anda untuk menjelajahi dan memanfaatkan berbagai fitur yang tersedia di website ini. Dengan demikian, kami berharap bahwa website ini akan menjadi sumber informasi yang bermanfaat bagi Anda dalam mengikuti perkembangan Pekerjaan Umum dan Perumahan di Kota Banjarbaru.</p>

            <p>Terima kasih atas perhatian dan partisipasi Anda dalam memanfaatkan website resmi Dinas Pekerjaan Umum dan Perumahan Rakyat Kota Banjarbaru. Bersama-sama, marilah kita berkomitmen untuk memajukan sektor Pekerjaan Umum dan Perumahan demi terwujudnya lingkungan yang lebih baik dan berkualitas bagi masyarakat Kota Banjarbaru.</p>

            <p>Salam hormat,</p>

            <p>Kepala Dinas PUPR Kota Banjarbaru,</p>

            <p>Eka Yuliesda Akbari, ST, MT</p>'
        ]);
    }
}
