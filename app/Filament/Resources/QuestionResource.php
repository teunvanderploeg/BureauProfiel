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

    protected static ?string $navigationIcon = 'heroicon-o-collection';

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
                Forms\Components\Select::make('answer_type')
                    ->options([
                        'text' => 'Tekst',
                        'date' => 'Datum',
                        'checkbox' => 'Checkbox',
                        'select' => 'Select',
                        'tel' => 'Telefoon nummer',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('sample_answers')
                    ->maxLength(65535),
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
                Forms\Components\Toggle::make('visible')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question'),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\TextColumn::make('answer_type'),
                Tables\Columns\TextColumn::make('sample_answers'),
                Tables\Columns\TextColumn::make('rules'),
                Tables\Columns\BooleanColumn::make('visible'),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime(),
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
