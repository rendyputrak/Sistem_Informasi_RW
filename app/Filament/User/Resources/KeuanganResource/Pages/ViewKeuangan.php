<?php

namespace App\Filament\User\Resources\KeuanganResource\Pages;

use App\Filament\User\Resources\KeuanganResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewKeuangan extends ViewRecord
{
    protected static string $resource = KeuanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
