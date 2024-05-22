<?php

namespace App\Filament\User\Resources\BeritaPengumumanResource\Pages;

use App\Filament\User\Resources\BeritaPengumumanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBeritaPengumuman extends EditRecord
{
    protected static string $resource = BeritaPengumumanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
