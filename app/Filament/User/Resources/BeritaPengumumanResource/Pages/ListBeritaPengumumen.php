<?php

namespace App\Filament\User\Resources\BeritaPengumumanResource\Pages;

use App\Filament\User\Resources\BeritaPengumumanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBeritaPengumumen extends ListRecords
{
    protected static string $resource = BeritaPengumumanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
