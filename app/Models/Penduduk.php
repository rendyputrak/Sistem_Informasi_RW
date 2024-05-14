<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 'penduduk';
    protected $primaryKey = 'penduduk_id';

    protected $fillable = [
        'NIK',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'pekerjaan',
        'status_pernikahan',
        'status_kependudukan',
        'level_id',
    ];

    public function level():BelongsTo
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
}
