<?php

namespace App\Filament\User\Resources\BeritaPengumumanResource\Pages;

use App\Filament\User\Resources\BeritaPengumumanResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBeritaPengumuman extends ViewRecord
{
    protected static string $resource = BeritaPengumumanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
