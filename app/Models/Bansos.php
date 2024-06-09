<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bansos extends Model
{
    use HasFactory;
    protected $table = 'bansos';

    protected $primaryKey = 'id';

    protected $fillable = [
        'penduduk_id',
        'penghasilan',
        'pengeluaran',
        'foto_gaji',
        'luas_rumah',
        'status_rumah',
        'foto_rumah',
        'tanggungan',
        'tanggal_pengajuan',
        'status_pengajuan',
        'keterangan',
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id', 'penduduk_id');
    }
}
