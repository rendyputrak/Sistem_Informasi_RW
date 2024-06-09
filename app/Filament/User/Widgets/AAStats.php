<?php

namespace App\Filament\User\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Penduduk;
use App\Models\Keuangan;
use App\Models\Bansos;
use App\Models\Pengaduan;

class AAStats extends BaseWidget
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
        $saldoRupiah = 'Rp ' . number_format($saldoSaatIni, 0, ',', '.');

        // Hitung pengaduan yang masuk
        $totalPengaduan = Pengaduan::count();

        // Hitung pengajuan bansos yang masuk
        $totalBansos = Bansos::count();

        return [
            Stat::make('Jumlah Penduduk', $jumlahPenduduk)
                ->description('Total penduduk saat ini')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),
            Stat::make('Jumlah Kas', $saldoRupiah)
                ->description('Saldo kas saat ini' . $tanggal)
                ->descriptionIcon('heroicon-m-banknotes')
                ->color($saldoSaatIni >= 0 ? 'success' : 'danger'),
            Stat::make('Jumlah Pengaduan', $totalPengaduan)
                ->description('Total pengaduan yang masuk')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('success'),
            Stat::make('Jumlah Pengajuan Bansos', $totalBansos)
                ->description('Total pengajuan bansos yang masuk')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('success'),
        ];
    }
}
