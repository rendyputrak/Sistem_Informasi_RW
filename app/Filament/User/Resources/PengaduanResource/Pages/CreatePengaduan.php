<?php

namespace App\Filament\User\Resources\PengaduanResource\Pages;

use App\Filament\User\Resources\PengaduanResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreatePengaduan extends CreateRecord
{
    protected static string $resource = PengaduanResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Set additional fields before creating the record
        $data['email_pengirim'] = Auth::user()->email;
        $data['nama_pengirim'] = Auth::user()->name;
        $data['tanggal_pengaduan'] = now();
        return $data;
    }
}
