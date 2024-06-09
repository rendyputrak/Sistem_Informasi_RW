<?php

namespace App\Filament\User\Resources\PengaduanResource\Pages;

use App\Filament\User\Resources\PengaduanResource;
use App\Models\Pengaduan;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Override;

class ListPengaduans extends ListRecords
{
    protected static string $resource = PengaduanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public static function forCurrentUser(): Builder
    {
        $userId = Auth::id();

        return Pengaduan::where('penduduk_id', $userId);
    }
}
