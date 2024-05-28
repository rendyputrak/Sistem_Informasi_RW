<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AgendaAcaraResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->agenda_acara_id,
            'nama_acara' => $this->nama_acara,
            'tanggal' => $this->tanggal,
            'waktu' => $this->waktu,
            'lokasi' => $this->lokasi,
            'deskripsi' => $this->deskripsi,
            'foto' => $this->foto,
        ];
    }
}
