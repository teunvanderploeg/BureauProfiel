<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AssignmentResource\Pages;
use App\Filament\Resources\AssignmentResource\RelationManagers;
use App\Models\Assignment;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class AssignmentResource extends Resource
{
    protected static ?string $model = Assignment::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle';

    protected static ?string $navigationGroup = 'Client';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Assignment')
                    ->required(),
                Forms\Components\TextInput::make('day')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('date'),
                Forms\Components\DateTimePicker::make('from')
                    ->required(),
                Forms\Components\DateTimePicker::make('through')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->maxLength(255),
                Forms\Components\TextInput::make('postcode')
                    ->maxLength(255),
                Forms\Components\TextInput::make('city')
                    ->maxLength(255),
                Forms\Components\TextInput::make('compensation')
                    ->required(),
                Forms\Components\TextInput::make('compensation respondent')
                    ->required(),
                Forms\Components\Textarea::make('detail')
                    ->maxLength(65535),
                Forms\Components\Textarea::make('info')
                    ->maxLength(65535),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Assignment'),
                Tables\Columns\TextColumn::make('day'),
                Tables\Columns\TextColumn::make('date')
                    ->date(),
                Tables\Columns\TextColumn::make('from')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('through')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\TextColumn::make('postcode'),
                Tables\Columns\TextColumn::make('city'),
                Tables\Columns\TextColumn::make('compensation'),
                Tables\Columns\TextColumn::make('compensation respondent'),
                Tables\Columns\TextColumn::make('detail'),
                Tables\Columns\TextColumn::make('info'),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAssignments::route('/'),
            'create' => Pages\CreateAssignment::route('/create'),
            'edit' => Pages\EditAssignment::route('/{record}/edit'),
        ];
    }
}
