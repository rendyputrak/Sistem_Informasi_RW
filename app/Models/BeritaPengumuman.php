<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BeritaPengumuman extends Model
{
    use HasFactory;

    protected $table = 'berita_pengumuman';
    protected $primaryKey = 'berita_pengumuman_id';

    protected $fillable = [
        'judul',
        'isi',
        'jenis',
        'tanggal_posting',
        'admin_id',
    ];

    public function admin():BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
