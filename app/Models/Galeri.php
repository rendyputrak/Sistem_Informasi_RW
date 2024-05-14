<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';
    protected $primaryKey = 'galeri_id';

    protected $fillable = [
        'judul',
        'deskripsi',
        'foto',
        'tanggal_upload',
        'admin_id',
    ];

    public function admin():BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
