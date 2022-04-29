<?php

namespace App\Filament\Resources\RespondentResource\Widgets;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Respondent;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatisticsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Accepted respondents', Respondent::query()->where('accepted', '=', true)->count()),
            Card::make('Not accepted respondents', Respondent::query()->where('accepted', '=', false)->count()),
            Card::make('All answers', Answer::all()->count()),
        ];
    }
}
