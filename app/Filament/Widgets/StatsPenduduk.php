<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Penduduk;
use App\Models\Keuangan;


class StatsPenduduk extends BaseWidget
{
    protected function getStats(): array
    {
        //hitung jumlah penduduk
        $jumlahPenduduk = Penduduk::count();

        // Ambil tanggal inputan (contoh: $tanggal)
        $tanggal = request()->get('tanggal');

        // Hitung total kas saat ini berdasarkan tanggal inputan
        $totalPemasukan = Keuangan::where('jenis', 'pemasukan')->sum('jumlah');
        $totalPengeluaran = Keuangan::where('jenis', 'pengeluaran')->sum('jumlah');
        $saldoSaatIni = $totalPemasukan - $totalPengeluaran;

        return [
            Stat::make('Jumlah Penduduk', $jumlahPenduduk)
                ->description('Total penduduk saat ini')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
            Stat::make('Jumlah Kas', $saldoSaatIni)
                ->description('Saldo kas saat ini' . $tanggal)
                ->descriptionIcon('heroicon-m-banknotes')
                ->color($saldoSaatIni >= 0 ? 'success' : 'danger'),
        ];
    }
}
