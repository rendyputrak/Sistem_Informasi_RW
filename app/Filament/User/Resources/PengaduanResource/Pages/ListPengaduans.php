<?php

namespace App\Filament\User\Resources\PengaduanResource\Pages;

use App\Filament\User\Resources\PengaduanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListPengaduans extends ListRecords
{
    protected static string $resource = PengaduanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableQuery(): ?\Illuminate\Database\Eloquent\Builder
    {
        // Ensure the table only shows records belonging to the logged-in user
        return parent::getTableQuery()->where('email_pengirim', Auth::user()->email);
    }
}
