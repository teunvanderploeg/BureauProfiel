<?php

namespace App\Filament\Pages;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Respondent;
use Filament\Pages\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

class Search extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.search';

    public $respondents;
    public $respondent;
    public $searchPage = True;
    public $questions;
    public $respondentCount = 0;
    public $respondentsCount;

    public function mount()
    {
        $this->questions = Question::all();
    }

    public function search($data)
    {
        $respondentsArray = null;
        $firstRound = True;

        foreach ($this->questions as $question) {
            $query = Answer::query()->with('respondent');
            if (($data[$question->slug] ?? null) != null || ($data[$question->slug . '-1'] ?? null) != null) {

                $this->makeQuery($question, $query, $data);

                $respondentsArray = $this->getRespondents($query, $firstRound, $respondentsArray);

                $firstRound = False;
            }
        }

        $respondentQuery = Respondent::query();

        if (($data['nodes'] ?? null) != null) {
            $respondentQuery->where('notes', 'like', '%' . $data['nodes'] . '%');
        }

        $respondents = $firstRound ? $respondentQuery : $respondentQuery->whereIn('id', $respondentsArray);
        $this->respondentsCount = $respondents->count();

        $this->respondents = $respondents->get();
        $this->respondent = $this->respondents->take(1)->skip(0);
        $this->searchPage = False;
    }

    public function nextRespondent()
    {
        if ($this->respondentCount != ($this->respondentsCount - 1)){
            $this->respondentCount++;
            $this->respondent = $this->respondents->skip($this->respondentCount)->take(1);
        }
    }

    public function previousRespondent()
    {
        if ($this->respondentCount != 0){
            $this->respondentCount--;
            $this->respondent = $this->respondents->skip($this->respondentCount)->take(1);
        }
    }

    function getDuplicates($array): array
    {
        return array_unique(array_diff_assoc($array, array_unique($array)));
    }


    public function getRespondents(Builder $query, bool $firstRound, ?array $respondents): array
    {
        $newRespondentsArray = $query->get()->pluck('respondent.id')->toArray();
        if (!$firstRound) {
            $newRespondentsArray = $this->getDuplicates(array_merge($respondents, $newRespondentsArray));
        }
        return $newRespondentsArray;
    }

    public function makeQuery(mixed $question, Builder $query, $data): void
    {
        $query->where('question_id', '=', $question->id);
        switch ($question->answer_type) {
            case 'checkbox':
                $query->where('answer', '=', 1);
                break;
            case 'text':
                $query->where('answer', 'like', '%' . $data[$question->slug] . '%');
                break;
            case 'date':
                $query->whereBetween('answer', [date($data[$question->slug . '-1']), date($data[$question->slug . '-2'])]);
                break;
            default:
                $query->where('answer', '=', $data[$question->slug]);
                break;
        }
    }

}
