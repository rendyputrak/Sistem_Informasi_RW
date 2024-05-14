<?php

namespace App\Filament\Resources\AgendaAcaraResource\Pages;

use App\Filament\Resources\AgendaAcaraResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAgendaAcaras extends ListRecords
{
    protected static string $resource = AgendaAcaraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
