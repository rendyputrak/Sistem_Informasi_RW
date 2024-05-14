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
        'pengirim_id',
    ];

    public function pengirim():BelongsTo
    {
        return $this->belongsTo(Pengirim::class, 'pengirim_id');
    }
}
