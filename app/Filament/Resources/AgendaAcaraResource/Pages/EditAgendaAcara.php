<?php

namespace App\Filament\Resources\AgendaAcaraResource\Pages;

use App\Filament\Resources\AgendaAcaraResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAgendaAcara extends EditRecord
{
    protected static string $resource = AgendaAcaraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
