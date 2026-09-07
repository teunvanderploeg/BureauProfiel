<?php

namespace App\Filament\Resources\RespondentResource\Widgets;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Respondent;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatisticsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Accepted respondents', Respondent::query()->where('accepted', '=', true)->count()),
            Stat::make('Not accepted respondents', Respondent::query()->where('accepted', '=', false)->count()),
            Stat::make('All answers', Answer::all()->count()),
        ];
    }
}
