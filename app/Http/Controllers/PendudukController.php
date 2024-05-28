<?php

namespace App\Http\Controllers;

use App\Http\Resources\PendudukResource;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index() {
        $penduduk = Penduduk::all();
        return PendudukResource::collection($penduduk);
    }
}
