<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('media')->truncate();
        DB::table('gambar_depan')->truncate();
        DB::table('documents')->truncate();
        DB::table('saran')->truncate();
        DB::table('link_icons')->truncate();

        DB::table('gambar_depan')->insert([
            'nama' => 'Eka Yuliesda Akbari, S.T., M.T',
            'link' => asset('img/Gambar Section 1.png'),
            'created_at' => now(),
        ]);

        for ($i = 0; $i < 20; $i++) {
            DB::table('saran')->insert([
                'nama' => \Str::random(10),
                'isi' => \Str::random(100),
                'created_at' => now()->subDays(rand(1, 55)),
            ]);
        }


        $this->call([
            UserSeeder::class,
            PageSeeder::class,
            CategorySeeder::class,
            BidangSeeder::class,
            LinkSeeder::class,
            PostSeeder::class,
            GallerySeeder::class,
            CategoryPostSeeder::class,
            MenuSeeder::class,
            SocmedSeeder::class,
            FooterLinkSeeder::class,
            LinkIconSeeder::class,
            ContactSeeder::class,
            QuestionnaireQuestionSeeder::class,
            QuestionnaireAnswerSeeder::class,
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
