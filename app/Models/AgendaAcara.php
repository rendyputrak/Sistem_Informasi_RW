<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AgendaAcara extends Model
{
    use HasFactory;

    protected $table = 'agenda_acara';
    protected $primaryKey = 'agenda_acara_id';

    protected $fillable = [
        'nama_acara',
        'tanggal',
        'waktu',
        'lokasi',
        'deskripsi',
        'admin_id',
    ];

    public function admin():BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
