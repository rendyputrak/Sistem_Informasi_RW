<?php

namespace App\Filament\User\Resources\PengaduanResource\Pages;

use App\Filament\User\Resources\PengaduanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditPengaduan extends EditRecord
{
    protected static string $resource = PengaduanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Ensure user can only edit their own records
        $pengaduan = $this->record;
        if ($pengaduan->email_pengirim !== Auth::user()->email) {
            abort(403);
        }
        return $data;
    }
}
