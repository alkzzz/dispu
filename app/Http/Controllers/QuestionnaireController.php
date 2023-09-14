<?php

namespace App\Http\Controllers;

use App\Exports\KuesionerExport;
use App\Models\QuestionnaireQuestion;
use App\Models\Respondent;
use App\Models\RespondentAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $questions = QuestionnaireQuestion::get();
        $respondents = Respondent::with('respondentAnswers.answer')->whereYear('created_at', date('Y'))->get();
        return view('backend.kuesioner', compact('respondents', 'questions'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $questions = QuestionnaireQuestion::with('answers')->get();
        return view('frontend.kuesioner', compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $respondent = Respondent::create($request->all());

            foreach ($request->answers as $questionId => $answerId) {
                RespondentAnswer::create([
                    'respondent_id' => $respondent->id,
                    'questionnaire_question_id' => $questionId,
                    'questionnaire_answer_id' => $answerId
                ]);
            }

            DB::commit();
            session()->flash('message', 'Berhasil mengirim respon.');
            return redirect()->route('kuesioner.create');
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with(['message' => "An error occurred in the system: {$e->getMessage()}", 'status' => 'failed']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Export the specified resource.
     */
    public function export(Request $request)
    {
        return Excel::download(new KuesionerExport($request->year), 'Kuesioner ' . $request->year . '.xlsx');
    }
}
