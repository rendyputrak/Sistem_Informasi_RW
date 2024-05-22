<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use App\Models\Penduduk;

class GenderChart extends ChartWidget
{
    protected static ?string $heading = 'Persebaran Penduduk Berdasarkan Jenis Kelamin';

    protected function getData(): array
    {
        // Ambil data jumlah penduduk berdasarkan jenis kelamin
        $data = Penduduk::selectRaw('jenis_kelamin, COUNT(*) as count')
            ->groupBy('jenis_kelamin')
            ->get();

        // Format data untuk chart
        $labels = ['Laki-Laki', 'Perempuan'];
        $counts = [0, 0]; // Inisialisasi dengan 0

        foreach ($data as $datum) {
            if ($datum->jenis_kelamin === 'L') {
                $counts[0] = $datum->count;
            } elseif ($datum->jenis_kelamin === 'P') {
                $counts[1] = $datum->count;
            }
        }
        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Penduduk Berdasarkan Jenis Kelamin',
                    'data' => $counts,
                    'backgroundColor' => ['#36A2EB', '#FF6384'],
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}