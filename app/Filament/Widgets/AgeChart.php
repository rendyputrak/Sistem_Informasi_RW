<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use App\Models\Penduduk;

class AgeChart extends ChartWidget
{
    protected static ?string $heading = 'Persebaran Penduduk Berdasarkan Usia';

    protected function getData(): array
    {
        $data = Penduduk::select('tanggal_lahir')->get();

        $ageGroups = [
            'Bayi' => 0,
            'Balita' => 0,
            'Anak-anak' => 0,
            'Remaja' => 0,
            'Dewasa' => 0,
            'Lansia' => 0,
        ];

        foreach ($data as $datum) {

            // Mendapatkan tanggal lahir dari data
            $tanggal_lahir = Carbon::parse($datum->tanggal_lahir);

            // Mendapatkan tanggal saat ini
            $tanggal_sekarang = Carbon::now();

            // Menghitung usia berdasarkan selisih tahun antara tanggal lahir dan tanggal saat ini
            $usia = $tanggal_sekarang->year - $tanggal_lahir->year;

            // Memeriksa apakah sudah melewati hari ulang tahun
            if ($tanggal_lahir->month > $tanggal_sekarang->month || ($tanggal_lahir->month === $tanggal_sekarang->month && $tanggal_lahir->day > $tanggal_sekarang->day)) {
                $usia--;
            }

            // Memastikan usia tidak kurang dari 0
            $usia = max(0, $usia);

            if ($usia <= 1) {
                $ageGroups['Bayi']++;
            } elseif ($usia <= 6) {
                $ageGroups['Balita']++;
            } elseif ($usia <= 12) {
                $ageGroups['Anak-anak']++;
            } elseif ($usia <= 20) {
                $ageGroups['Remaja']++;
            } elseif ($usia <= 64) {
                $ageGroups['Dewasa']++;
            } else {
                $ageGroups['Lansia']++;
            }
        }

        return [
            'datasets' => [
                [
                    'label' => 'Persebaran Penduduk Berdasarkan Usia',
                    'data' => array_values($ageGroups),
                    'backgroundColor' => [
                        '#FF9F40', // Bayi
                        '#FFCD56', // Balita
                        '#4BC0C0', // Anak-anak
                        '#9966FF', // Remaja
                        '#36A2EB', // Dewasa
                        '#FF6384', // Lansia
                    ],
                ],
            ],
            'labels' => array_keys($ageGroups),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
