<?php

namespace App\Filament\Resources\RespondentResource\Pages;

use App\Filament\Resources\RespondentResource;
use Filament\Resources\Pages\EditRecord;

class EditRespondent extends EditRecord
{
    protected static string $resource = RespondentResource::class;

    protected function getHeaderActions(): array
    {
        return [\Filament\Actions\DeleteAction::make()];
    }
}
