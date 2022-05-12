<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RunningAssignmentResource\Pages;
use App\Filament\Resources\RunningAssignmentResource\RelationManagers;
use App\Models\RunningAssignment;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class RunningAssignmentResource extends Resource
{
    protected static ?string $model = RunningAssignment::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle';

    protected static ?string $navigationGroup = 'On site';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\Toggle::make('visible')
                    ->required(),
                Forms\Components\TextInput::make('link')
                    ->url()
                    ->required()
                    ->maxLength(500),
                Forms\Components\FileUpload::make('image')
                    ->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\BooleanColumn::make('visible'),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('link'),
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
            'index' => Pages\ListRunningAssignments::route('/'),
            'create' => Pages\CreateRunningAssignment::route('/create'),
            'edit' => Pages\EditRunningAssignment::route('/{record}/edit'),
        ];
    }
}
