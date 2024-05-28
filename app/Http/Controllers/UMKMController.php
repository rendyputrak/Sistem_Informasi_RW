<?php

namespace App\Http\Controllers;

use App\Http\Resources\UMKMResource;
use App\Models\Umkm;
use Illuminate\Http\Request;

class UMKMController extends Controller
{
    public function index() {
        $penduduk = Umkm::all();
        return UMKMResource::collection($penduduk);
    }
}
