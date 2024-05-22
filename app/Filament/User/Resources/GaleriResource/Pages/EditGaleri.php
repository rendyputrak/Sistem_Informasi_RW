<?php

namespace App\Filament\User\Resources\GaleriResource\Pages;

use App\Filament\User\Resources\GaleriResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGaleri extends EditRecord
{
    protected static string $resource = GaleriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
