<?php

namespace App\Exports;

use App\Models\QuestionnaireQuestion;
use App\Models\Respondent;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromView;

class KuesionerExport implements FromView, WithTitle
{

    public function __construct($year)
    {
        $this->year = $year;
    }

    public function view(): View
    {
        return view('backend.exports.kuesioner',
        [
            'questions' => QuestionnaireQuestion::get(),
            'respondents' => Respondent::with('respondentAnswers.answer')->whereYear('created_at', $this->year)->get()
        ]);
    }

    public function title(): string
    {
         return 'Kuesioner ' . $this->year;
    }
}
