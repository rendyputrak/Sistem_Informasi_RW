<?php

namespace App\Filament\User\Resources\GaleriResource\Pages;

use App\Filament\User\Resources\GaleriResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewGaleri extends ViewRecord
{
    protected static string $resource = GaleriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
