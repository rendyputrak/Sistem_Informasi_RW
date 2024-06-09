<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function selesai($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->status_pengaduan = 'Selesai';
        $pengaduan->save();

        return redirect()->route('filament.resources.pengaduan.index');
    }

    public function proses($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->status_pengaduan = 'Diproses';
        $pengaduan->save();

        return redirect()->route('filament.resources.pengaduan.index');
    }

    public function tolak($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->status_pengaduan = 'Ditolak';
        $pengaduan->save();

        return redirect()->route('filament.resources.pengaduan.index');
    }
}
