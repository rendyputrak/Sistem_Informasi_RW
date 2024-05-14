<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengirim extends Model
{
    use HasFactory;

    protected $table = 'pengirim';
    protected $primaryKey = 'pengirim_id';

    protected $fillable = [
        'nama_pengirim',
        'email_pengirim',
    ];
}
