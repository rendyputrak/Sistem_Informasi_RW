<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Umkm extends Model
{
    use HasFactory;

    protected $table = 'umkm';
    protected $primaryKey = 'umkm_id';

    protected $fillable = [
        'nama_umkm',
        'alamat',
        'deskripsi',
        'foto',
        'penduduk_id',
    ];

    public function penduduk():BelongsTo
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id');
    }
}
