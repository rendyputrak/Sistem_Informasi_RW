<?php

namespace App\Filament\User\Resources\AgendaAcaraResource\Pages;

use App\Filament\User\Resources\AgendaAcaraResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAgendaAcaras extends ListRecords
{
    protected static string $resource = AgendaAcaraResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make(),
    //     ];
    // }
}
