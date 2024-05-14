<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin'; // Nama tabel dalam basis data
    protected $primaryKey = 'admin_id'; // Nama kolom primary key

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'password',
        'email',
        'level_id',
        'penduduk_id',
    ];
    
    public function level():BelongsTo
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
    
    public function penduduk():BelongsTo
    {
        return $this->belongsTo(Penduduk::class, 'penduduk_id');
    }
}
