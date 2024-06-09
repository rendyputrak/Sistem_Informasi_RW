<?php

namespace App\Http\Controllers;

use App\Http\Resources\UMKMResource;
use App\Models\Umkm;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UMKMController extends Controller
{
    public function index() {
        $umkm = Umkm::all();
        $umkm->each(function ($item) {
            $item->foto_url = asset('storage/' . $item->foto);
        });
    
        return response()->json(['data' => $umkm]);
    }
}
