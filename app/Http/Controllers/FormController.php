<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Respondent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
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
        $request->validate($this->getRules());

        $parameters = $request->all();

        $respondent = Respondent::query()->create([
            'email' => $request->get('email'),
            'accepted' => false,
        ]);

        foreach (Question::query()->where('visible', '=', true)->get() as $question) {
            if ($question->answer_type == 'checkbox') {
                $parameters[$question->slug] = isset($parameters[$question->slug]) ? 'Yes' : 'No';
            }
            Answer::query()->create([
                'respondent_id' => $respondent->getKey(),
                'question_id' => $question->id,
                'answer' => $parameters[$question->slug],
            ]);
        }

        return back()->with('message', 'Je bent ingeschreven in het systeem!');
    }

    /**
     * @return array|mixed|string[]
     */
    public function getRules(): mixed
    {
        $rules = [];
        foreach (Question::query()->where('visible', true)->get() as $question) {
            if ($question->answer_type == 'select') {
                $rules = $rules + [$question->slug => array_merge(['in:' . $question->sample_answers], $question->rules)];
            } else if ($question->rules !== null) {
                $rules = $rules + [$question->slug => $question->rules];
            }
        }
        return $rules;
    }
}
