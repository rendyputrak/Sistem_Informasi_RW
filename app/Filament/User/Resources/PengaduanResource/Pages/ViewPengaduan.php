<?php

namespace App\Filament\User\Resources\PengaduanResource\Pages;

use App\Filament\User\Resources\PengaduanResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPengaduan extends ViewRecord
{
    protected static string $resource = PengaduanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
