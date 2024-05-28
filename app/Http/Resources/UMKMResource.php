<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UMKMResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->umkm_id,
            'nama_umkm' => $this->nama_umkm,
            'alamat' => $this->alamat,
            'deskripsi' => $this->deskripsi,
            'foto' => $this->foto,
        ];
    }
}
