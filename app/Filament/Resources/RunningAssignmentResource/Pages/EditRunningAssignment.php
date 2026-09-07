<?php

namespace App\Filament\Resources\RunningAssignmentResource\Pages;

use App\Filament\Resources\RunningAssignmentResource;
use Filament\Resources\Pages\EditRecord;

class EditRunningAssignment extends EditRecord
{
    protected static string $resource = RunningAssignmentResource::class;

    protected function getHeaderActions(): array
    {
        return [\Filament\Actions\DeleteAction::make()];
    }
}
