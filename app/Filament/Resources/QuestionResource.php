<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionResource\Pages;
use App\Filament\Resources\QuestionResource\RelationManagers;
use App\Filament\Resources\QuestionResource\RelationManagers\AnswersRelationManager;
use App\Models\Question;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class QuestionResource extends Resource
{
    protected static ?string $model = Question::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';
    protected static ?string $navigationLabel = 'Vragen';
    protected static ?string $navigationGroup = 'On site';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('question')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\MultiSelect::make('rules')
                    ->options([
                        'required' => 'Required',
                        'date' => 'Datum',
                        'email' => 'Email',
                        'string' => 'String',
                        'nullable' => 'Nullable',
                        'max:255' => 'Maximaal 255 tekens',
                        'unique:respondents' => 'Unique op respondents',
                    ]),
                Forms\Components\Textarea::make('sample_answers')
                    ->helperText('Zorg dat de opties worden gescheiden door een ,')
                    ->maxLength(65535),
                Forms\Components\Toggle::make('visible')
                    ->required(),
                Forms\Components\Toggle::make('searchable')
                    ->required(),
                Forms\Components\Select::make('answer_type')
                    ->options([
                        'text' => 'Tekst',
                        'date' => 'Datum',
                        'checkbox' => 'Checkbox',
                        'select' => 'Select',
                        'tel' => 'Telefoon nummer',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question')->searchable(),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('answer_type'),
                Tables\Columns\TextColumn::make('sample_answers')
                    ->limit('30'),
                Tables\Columns\TextColumn::make('rules')
                    ->limit('30'),
                Tables\Columns\BooleanColumn::make('visible'),
                Tables\Columns\BooleanColumn::make('searchable'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            AnswersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuestions::route('/'),
            'create' => Pages\CreateQuestion::route('/create'),
            'edit' => Pages\EditQuestion::route('/{record}/edit'),
        ];
    }
}
