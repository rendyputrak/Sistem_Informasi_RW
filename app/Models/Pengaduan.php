<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';
    protected $primaryKey = 'pengaduan_id';

    protected $fillable = [
        'judul_pengaduan',
        'isi_pengaduan',
        'tanggal_pengaduan',
        'foto',
        'status_pengaduan',
        'penduduk_id',
    ];

    public function penduduk():BelongsTo
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id');
    }
}
