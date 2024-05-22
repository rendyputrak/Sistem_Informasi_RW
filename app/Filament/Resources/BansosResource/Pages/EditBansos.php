<?php

namespace App\Filament\Resources\BansosResource\Pages;

use App\Filament\Resources\BansosResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBansos extends EditRecord
{
    protected static string $resource = BansosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
