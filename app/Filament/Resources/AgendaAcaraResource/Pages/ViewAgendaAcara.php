<?php

namespace App\Filament\Resources\AgendaAcaraResource\Pages;

use App\Filament\Resources\AgendaAcaraResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAgendaAcara extends ViewRecord
{
    protected static string $resource = AgendaAcaraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
