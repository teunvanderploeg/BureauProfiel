<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Respondent;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(Request $request)
    {
        return view('form', ["questions" => Question::query()->where('visible', true)->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $parameters = $request->all();
        $parametersKeys = array_keys($parameters);
        $parametersValues = array_values($parameters);
        $parametersCount = count($parameters) - 1;
        $rules = [];
        foreach (Question::query()->where('visible', true)->get() as $question) {
            $rules = $rules + [$question->slug => 'required'];
        }
        $request->validate($rules);

        $email = $request->get('email');

        $respondent = Respondent::query()->create([
            'email' => $email,
            'accepted' => false,
        ]);

        for ($x = 0; $x <= $parametersCount; $x += 1) {
            $questionId = Question::query()->where('slug', '=', $parametersKeys[$x])->pluck('id')->first();
            if ($questionId != null) {
                Answer::query()->create([
                    'respondent_id' => $respondent->getKey(),
                    'question_id' => $questionId,
                    'answer' => $parametersValues[$x],
                ]);
            }
        }
        return back();
    }

}
