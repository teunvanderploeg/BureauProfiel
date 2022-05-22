<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RespondentResource\Pages;
use App\Filament\Resources\RespondentResource\RelationManagers;
use App\Models\Question;
use App\Models\Respondent;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class RespondentResource extends Resource
{
    protected static ?string $model = Respondent::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Respondent';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('accepted')
                    ->required(),
                Forms\Components\Textarea::make('notes')
                    ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\BooleanColumn::make('accepted'),
                Tables\Columns\TextColumn::make('notes')
                    ->searchable()
                    ->limit('30'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\AnswersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRespondents::route('/'),
            'create' => Pages\CreateRespondent::route('/create'),
            'edit' => Pages\EditRespondent::route('/{record}/edit'),
        ];
    }
}
