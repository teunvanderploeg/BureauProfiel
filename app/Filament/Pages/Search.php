<?php

namespace App\Filament\Pages;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Respondent;
use Filament\Pages\Page;
use Illuminate\Database\Eloquent\Builder;

class Search extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-search';
    protected static ?string $navigationLabel = 'Filteren';

    protected static string $view = 'filament.pages.search';

    public $respondents;
    public $respondent;
    public bool $searchPage = True;
    public $questions;
    public int $respondentCount = 0;
    public $respondentsCount;
    public $emailList;
    public $data;
    public bool $postcodeDesc = False;
    public bool $dateOfBirthDesc = False;
    public array $childQuestionArray = [
        "geboortedatum-kind-1",
        "geslacht-kind-1",
        "geboortedatum-kind-2",
        "geslacht-kind-2",
        "geboortedatum-kind-3",
        "geslacht-kind-3",
        "geboortedatum-kind-4",
        "geslacht-kind-4"];

    public function mount()
    {
        $this->questions = Question::query()->where('searchable', '=', True)->get();
    }

    public function search($data)
    {
        $respondentsArray = null;
        $firstRound = True;
        $this->data = collect($data);
        foreach ($this->questions as $question) {
            $query = Answer::query()->with('respondent');
            if (!in_array($question->slug, $this->childQuestionArray)) {
                if (($data[$question->slug] ?? null) != null || ($data[$question->slug . '-1'] ?? null) != null) {
                    $this->makeQuery($question, $query, $data);

                    $respondentsArray = $this->getRespondents($query, $firstRound, $respondentsArray);

                    $firstRound = false;
                }
            }
        }

        if (($data['age-child-1'] ?? null) != null && ($data['age-child-2'] ?? null) != null) {
            $questions = Question::query()
                ->where('slug', 'like', 'geboortedatum-kind' . '%')
                ->get();

            $respondentsArrayFilteredByChildrenAge = $this->getArrayOfRespondentsFilteredByTheChildren($data, $questions);

            $respondentsArray = $firstRound ? $respondentsArrayFilteredByChildrenAge : $this->getDuplicates(array_merge($respondentsArray, $respondentsArrayFilteredByChildrenAge));
            $firstRound = false;
        }

        if (($data['gender-child'] ?? null) != null) {

            $questions = Question::query()
                ->where('slug', 'like', 'geslacht-kind' . '%')
                ->get();

            $respondentsArrayFilteredByChildrenGender = $this->getArrayOfRespondentsFilteredByTheChildren($data, $questions, true);

            $respondentsArray = $firstRound ? $respondentsArrayFilteredByChildrenGender : $this->getDuplicates(array_merge($respondentsArray, $respondentsArrayFilteredByChildrenGender));
            $firstRound = false;
        }

        $respondentQuery = Respondent::query()->where('accepted', True);

        if (($data['nodes'] ?? null) != null) {
            $respondentQuery->where('notes', 'like', '%' . $data['nodes'] . '%');
        }

        $respondents = $firstRound ? $respondentQuery : $respondentQuery->whereIn('id', $respondentsArray);

        $this->setEmailList($respondents);

        $this->respondentsCount = $respondents->count();
        $this->respondentCount = 0;
        $this->respondents = $respondents->get();
        $this->respondent = $this->respondents->first();

        $this->changeSearchPage();
    }

    public function nextRespondent()
    {
        if ($this->respondentCount != ($this->respondentsCount - 1)) {
            $this->respondentCount++;
            $this->respondent = Respondent::query()->find($this->respondents[$this->respondentCount]['id']);
        }
    }

    public function previousRespondent()
    {
        if ($this->respondentCount != 0) {
            $this->respondentCount--;
            $this->respondent = Respondent::query()->find($this->respondents[$this->respondentCount]['id']);
        }
    }

    public function sortRespondents($questionSlug)
    {
        $questionId = Question::where('slug', '=', $questionSlug)->pluck('id')->first();
        $questions = collect();
        $respondents = collect();

        foreach ($this->respondents as $respondent) {
            $respondent = Respondent::query()->find($respondent['id']);
            $questions->add($respondent->answers()->where('answers.question_id', '=', $questionId)->first());
        }

        $desc = $this->needToBeDescending($questionSlug);
        $questions = $desc ? $questions->sortByDesc('answer') : $questions->sortBy('answer');

        foreach ($questions as $question) {
            $respondents->add($question->respondent);
        }

        $this->respondentCount = 0;
        $this->respondents = $respondents;
        $this->respondent = $this->respondents->first();
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
                if ($question->slug == 'postcode') {
                    $query->where('answer', 'like', $data[$question->slug] . '%');
                } else {
                    $query->where('answer', 'like', '%' . $data[$question->slug] . '%');
                }
                break;
            case 'date':
                $query->whereBetween('answer', [date($data[$question->slug . '-1']), date($data[$question->slug . '-2'])]);
                break;
            default:
                $query->where('answer', '=', $data[$question->slug]);
                break;
        }
    }

    public function changeSearchPage()
    {
        $this->searchPage = !$this->searchPage;
    }

    public function setEmailList(Builder $respondents): void
    {
        $emails = $respondents->get('email');
        $emailsString = '';
        foreach ($emails as $email) {
            if ($emailsString == null) {
                $emailsString = $email->email;
            } else {
                $emailsString = $emailsString . '\n' . $email->email;
            }
        }
        $this->emailList = $emailsString;
    }

    public function needToBeDescending($questionSlug): bool
    {
        $desc = false;
        if ($questionSlug == 'geboortedatum') {
            if ($this->dateOfBirthDesc) {
                $desc = true;
            }
            $this->dateOfBirthDesc = !$this->dateOfBirthDesc;
        }
        if ($questionSlug == 'postcode') {
            if ($this->postcodeDesc) {
                $desc = true;
            }
            $this->postcodeDesc = !$this->postcodeDesc;
        }
        return $desc;
    }

    public function getArrayOfRespondentsFilteredByTheChildren($data, $questions, $gender = false): array
    {
        $respondentsArrayChildes = [];
        $query = Answer::query()->with('respondent');

        foreach ($questions as $question) {
            $query->where('question_id', '=', $question->id);

            if ($gender) {
                $query->where('answer', '=', $data['gender-child']);
            } else {
                $query->whereBetween('answer', [date($data['age-child-1']), date($data['age-child-2'])]);
            }

            $respondentsArrayChildes = array_merge($respondentsArrayChildes, $query->get()->pluck('respondent.id')->toArray());
        }

        return array_unique($respondentsArrayChildes);
    }

}
