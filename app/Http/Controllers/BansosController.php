<?php

namespace App\Http\Controllers;

use App\Models\Bansos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BansosController extends Controller
{
    public function setujui(Bansos $bansos)
    {
        $bansos->status_pengajuan = 'Disetujui';
        $bansos->save();

        return redirect()->back()->with('success', 'Bansos berhasil disetujui.');
    }

    public function tolak(Bansos $bansos)
    {
        $bansos->status_pengajuan = 'Ditolak';
        $bansos->save();

        return redirect()->back()->with('success', 'Bansos berhasil ditolak.');
    }
}
