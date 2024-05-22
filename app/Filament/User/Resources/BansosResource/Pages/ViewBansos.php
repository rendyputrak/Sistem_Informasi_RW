<?php

namespace App\Filament\User\Resources\BansosResource\Pages;

use App\Filament\User\Resources\BansosResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBansos extends ViewRecord
{
    protected static string $resource = BansosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
