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

        for ($x = 0; $x <= (count($parameters) - 1); $x += 1) {
            $this->createAnswer($parameters, $x, $respondent);
        }
        return back()->with('message', 'Je bent ingeschreven in het systeem!');
    }

    /**
     * @return array|mixed|string[]
     */
    public function getRules(): mixed
    {
        $rules = [];
        $questions = Question::query()->where('visible', true)->get();
        foreach ($questions as $question) {
            if ($question->answer_type !== 'checkbox' || $question->slug == 'Privacy-Statement') {
                $rules = $rules + [$question->slug => 'required'];
            }
        }
        return $rules;
    }

    /**
     * @param array $parameters
     * @param int $x
     * @param Model|Builder $respondent
     * @return void
     */
    public function createAnswer(array $parameters, int $x, Model|Builder $respondent): void
    {
        $questionId = Question::query()->where('slug', '=', array_keys($parameters)[$x])->pluck('id')->first();
        if ($questionId != null) {
            Answer::query()->create([
                'respondent_id' => $respondent->getKey(),
                'question_id' => $questionId,
                'answer' => array_values($parameters)[$x],
            ]);
        }
    }

}
