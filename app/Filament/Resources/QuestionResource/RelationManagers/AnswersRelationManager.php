<?php

namespace App\Filament\Resources\QuestionResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Filament\Tables;

class AnswersRelationManager extends HasManyRelationManager
{
    protected static string $relationship = 'answers';

    protected static ?string $recordTitleAttribute = 'answer';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('answer'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('respondent.email'),
                Tables\Columns\TextColumn::make('answer'),
            ])
            ->filters([
                //
            ]);
    }
}
