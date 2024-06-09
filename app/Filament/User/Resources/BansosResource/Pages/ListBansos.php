<?php

namespace App\Filament\User\Resources\BansosResource\Pages;

use App\Filament\User\Resources\BansosResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Models\Bansos;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ListBansos extends ListRecords
{
    protected static string $resource = BansosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public static function forCurrentUser(): Builder
    {
        $userId = Auth::id();

        return Bansos::where('penduduk_id', $userId);
    }
}
