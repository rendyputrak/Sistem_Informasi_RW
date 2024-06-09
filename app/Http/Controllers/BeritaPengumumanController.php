<?php

namespace App\Http\Controllers;

use App\Http\Resources\BeritaPengumumanResource;
use App\Models\BeritaPengumuman;
use Illuminate\Http\Request;

class BeritaPengumumanController extends Controller
{
    public function index() {
        $pengumuman = BeritaPengumuman::all();
        $pengumuman->each(function ($item) {
            $item->foto_url = asset('storage/' . $item->foto);
        });
    
        return response()->json(['data' => $pengumuman]);
    }
}
