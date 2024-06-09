<?php

namespace App\Http\Controllers;

use App\Http\Resources\GaleriResource;
use App\Models\Galeri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index() {
        $galeri = Galeri::all();
        $galeri->each(function ($item) {
            $item->foto_url = asset('storage/' . $item->foto);
        });
    
        return response()->json(['data' => $galeri]);
    }
}
