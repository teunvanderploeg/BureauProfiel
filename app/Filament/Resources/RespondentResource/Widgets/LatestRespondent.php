<?php

namespace App\Filament\Resources\RespondentResource\Widgets;

use App\Models\Respondent;
use Closure;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestRespondent extends BaseWidget
{
    protected function getTableQuery(): Builder
    {
        return Respondent::query()->latest()->limit(5);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('email'),
            Tables\Columns\BooleanColumn::make('accepted'),
        ];
    }
}
