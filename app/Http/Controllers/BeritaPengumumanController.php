<?php

namespace App\Http\Controllers;

use App\Http\Resources\BeritaPengumumanResource;
use App\Models\BeritaPengumuman;
use Illuminate\Http\Request;

class BeritaPengumumanController extends Controller
{
    public function index() {
        $pengumuman = BeritaPengumuman::all();
        return BeritaPengumumanResource::collection($pengumuman);
    }

    public function show($id) {
        $pengumuman = BeritaPengumuman::findOrFail($id);
        return new BeritaPengumumanResource($pengumuman);
    }
}
