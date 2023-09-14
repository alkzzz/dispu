<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionnaireQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (DB::table('questionnaire_questions')->get()->count() == 0) {
            DB::table('questionnaire_questions')->insert([
                [
                    'name' => 'Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya?',
                ],
                [
                    'name' => 'Bagaimana pemahaman Saudara tentang kemudahan prosedur pelayanan di unit ini?',
                ],
                [
                    'name' => 'Bagaimana pendapat Saudara tentang kecepatan waktu dalam memberikan pelayanan?',
                ],
                [
                    'name' => 'Bagaimana pendapat Saudara tentang kewajaran biaya/tarif dalam pelayanan?',
                ],
                [
                    'name' => 'Bagaimana pendapat Saudara tentang kesesuaian produk pelayanan antara yang tercantum dalam standar pelayanan dengan hasil yang diberikan?',
                ],
                [
                    'name' => 'Bagaimana pendapat Saudara tentang kompetensi/kemampuan petugas dalam pelayanan?',
                ],
                [
                    'name' => 'Bagaimana pendapat Saudara tentang perilaku petugas dalam pelayanan terkait kesopanan dan keramahan?',
                ],
                [
                    'name' => 'Bagaimana pendapat Saudara tentang kualitas sarana dan prasarana?',
                ],
                [
                    'name' => 'Bagaimana pendapat Saudara tentang penanganan pengaduan pengguna layanan?',
                ],
            ]);
        }
    }
}
