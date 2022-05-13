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

function getFilter(): array
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
                    ->email()
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
            ->filters(getFilter());
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
