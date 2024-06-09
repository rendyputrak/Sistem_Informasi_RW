<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GaleriResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'galeri_id' => $this->galeri_id,
            'judul' => $this->judul,
            'deskripsi' => $this->deskripsi,
            // 'foto' => $this->foto,
        ];
    }
}
