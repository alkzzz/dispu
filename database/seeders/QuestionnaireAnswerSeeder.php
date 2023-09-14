<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionnaireAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (DB::table('questionnaire_answers')->get()->count() == 0) {
            DB::table('questionnaire_answers')->insert([
                [
                    'questionnaire_question_id' => 1,
                    'name' => 'Tidak Sesuai',
                    'score' => 1
                ],
                [
                    'questionnaire_question_id' => 1,
                    'name' => 'Kurang Sesuai',
                    'score' => 2
                ],
                [
                    'questionnaire_question_id' => 1,
                    'name' => 'Sesuai',
                    'score' => 3
                ],
                [
                    'questionnaire_question_id' => 1,
                    'name' => 'Sangat Sesuai',
                    'score' => 4
                ],

                [
                    'questionnaire_question_id' => 2,
                    'name' => 'Tidak Mudah',
                    'score' => 1
                ],
                [
                    'questionnaire_question_id' => 2,
                    'name' => 'Kurang Mudah',
                    'score' => 2
                ],
                [
                    'questionnaire_question_id' => 2,
                    'name' => 'Mudah',
                    'score' => 3
                ],
                [
                    'questionnaire_question_id' => 2,
                    'name' => 'Sangat Mudah',
                    'score' => 4
                ],

                [
                    'questionnaire_question_id' => 3,
                    'name' => 'Tidak Cepat',
                    'score' => 1
                ],
                [
                    'questionnaire_question_id' => 3,
                    'name' => 'Kurang Cepat',
                    'score' => 2
                ],
                [
                    'questionnaire_question_id' => 3,
                    'name' => 'Cepat',
                    'score' => 3
                ],
                [
                    'questionnaire_question_id' => 3,
                    'name' => 'Sangat Cepat',
                    'score' => 4
                ],

                [
                    'questionnaire_question_id' => 4,
                    'name' => 'Sangat Mahal',
                    'score' => 1
                ],
                [
                    'questionnaire_question_id' => 4,
                    'name' => 'Cukup Mahal',
                    'score' => 2
                ],
                [
                    'questionnaire_question_id' => 4,
                    'name' => 'Murah',
                    'score' => 3
                ],
                [
                    'questionnaire_question_id' => 4,
                    'name' => 'Gratis',
                    'score' => 4
                ],

                [
                    'questionnaire_question_id' => 5,
                    'name' => 'Tidak Sesuai',
                    'score' => 1
                ],
                [
                    'questionnaire_question_id' => 5,
                    'name' => 'Kurang Sesuai',
                    'score' => 2
                ],
                [
                    'questionnaire_question_id' => 5,
                    'name' => 'Sesuai',
                    'score' => 3
                ],
                [
                    'questionnaire_question_id' => 5,
                    'name' => 'Sangat Sesuai',
                    'score' => 4
                ],

                [
                    'questionnaire_question_id' => 6,
                    'name' => 'Tidak Kompeten',
                    'score' => 1
                ],
                [
                    'questionnaire_question_id' => 6,
                    'name' => 'Kurang Kompeten',
                    'score' => 2
                ],
                [
                    'questionnaire_question_id' => 6,
                    'name' => 'Kompeten',
                    'score' => 3
                ],
                [
                    'questionnaire_question_id' => 6,
                    'name' => 'Sangat Kompeten',
                    'score' => 4
                ],

                [
                    'questionnaire_question_id' => 7,
                    'name' => 'Tidak Sopan dan Tidak Ramah',
                    'score' => 1
                ],
                [
                    'questionnaire_question_id' => 7,
                    'name' => 'Kurang Sopan dan Kurang Ramah',
                    'score' => 2
                ],
                [
                    'questionnaire_question_id' => 7,
                    'name' => 'Sopan dan Ramah',
                    'score' => 3
                ],
                [
                    'questionnaire_question_id' => 7,
                    'name' => 'Sangat Sopan dan Sangat Ramah',
                    'score' => 4
                ],

                [
                    'questionnaire_question_id' => 8,
                    'name' => 'Buruk',
                    'score' => 1
                ],
                [
                    'questionnaire_question_id' => 8,
                    'name' => 'Cukup',
                    'score' => 2
                ],
                [
                    'questionnaire_question_id' => 8,
                    'name' => 'Baik',
                    'score' => 3
                ],
                [
                    'questionnaire_question_id' => 8,
                    'name' => 'Sangat Baik',
                    'score' => 4
                ],

                [
                    'questionnaire_question_id' => 9,
                    'name' => 'Tidak Ada',
                    'score' => 1
                ],
                [
                    'questionnaire_question_id' => 9,
                    'name' => 'Ada Tetapi Tidak Berfungsi',
                    'score' => 2
                ],
                [
                    'questionnaire_question_id' => 9,
                    'name' => 'Berfungsi Kurang Maksimal',
                    'score' => 3
                ],
                [
                    'questionnaire_question_id' => 9,
                    'name' => 'Dikelola Dengan Baik',
                    'score' => 4
                ],
            ]);
        }
    }
}
