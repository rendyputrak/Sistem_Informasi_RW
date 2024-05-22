<?php

namespace App\Filament\User\Resources\KeuanganResource\Pages;

use App\Filament\User\Resources\KeuanganResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKeuangan extends EditRecord
{
    protected static string $resource = KeuanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
