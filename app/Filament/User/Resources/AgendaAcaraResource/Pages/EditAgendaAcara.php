<?php

namespace App\Filament\User\Resources\AgendaAcaraResource\Pages;

use App\Filament\User\Resources\AgendaAcaraResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAgendaAcara extends EditRecord
{
    protected static string $resource = AgendaAcaraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
