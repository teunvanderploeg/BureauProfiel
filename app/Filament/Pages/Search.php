<?php

namespace App\Filament\Pages;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Respondent;
use Filament\Pages\Actions\Action;
use Filament\Pages\Page;

class Search extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.search';

    public $respondents = null;
    public $respondentId = 1;
    public $searchPage = True;
    public $questions = [];

    public function mount()
    {
        $this->questions = Question::all();
    }

    public function search($data)
    {
        $query = Answer::query();
        foreach ($this->questions as $question) {
            if (isset($data[$question->slug])) {
                if ($question->answer_type == 'checkbox') {
                    if ($data[$question->slug] == 'on') {
//                        $query->where(, '=', True);
                    }
                }
            }
        }
        $respondentIds = [];
        foreach ($query->get() as $anser) {
            $respondentIds = array_merge($respondentIds, array($anser->respondent->id));
        }
        $respondentIds = array_unique($respondentIds);
        $this->respondents = Respondent::query()->findMany($respondentIds);
        $this->respondent = $this->respondents->first();

        $this->searchPage = False;
    }

    public function changeSearchPage()
    {
        $this->searchPage = True;
    }

    function makeQuery(): array
    {
        $filters = [];

        $questions = Question::all();

        foreach ($questions as $question) {
            if ($question->answer_type == 'checkbox') {
//            $filters[] = SelectFilter::make($question->slug)->relationship('answers', 'answer');
//            $filters[] = Filter::make($question->slug)->query(fn(Builder $query): Builder =>
//            $query->join('answers', function ($join) use ($question) {
//                $join->on('respondents.id', '=', 'answers.respondent_id')
//                    ->where('answers.answer', '=', 'Yes');
//            })->select('respondents.*')
//            );
            }
        }
        return $filters;
    }
}
