<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BeritaPengumumanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->berita_pengumuman_id,
            'judul' => $this->judul,
            'isi' => $this->isi,
            'foto' => $this->foto,
        ];
    }
}
