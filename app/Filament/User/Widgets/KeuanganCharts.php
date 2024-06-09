<?php

namespace App\Filament\User\Widgets;

use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use App\Models\Keuangan;

class KeuanganCharts extends ChartWidget
{
    protected static ?string $heading = 'Jumlah Saldo 30 Hari Terakhir';
    protected static ?string $maxHeight = '200px';
    protected static ?string $width = '12';

    protected function getData(): array
    {
        $endDate = Carbon::today();
        $startDate = Carbon::today()->subDays(30);
        
        $transactions = Keuangan::whereBetween('tanggal', [$startDate, $endDate])
            ->orderBy('tanggal', 'asc')
            ->get();
        
        $saldo = 0;
        $dataPoints = [];
        $currentDate = $startDate->copy();
        
        while ($currentDate <= $endDate) {
            $dailyTransactions = $transactions->where('tanggal', $currentDate->toDateString());
            
            foreach ($dailyTransactions as $transaction) {
                if ($transaction->jenis === 'pemasukan') {
                    $saldo += $transaction->jumlah;
                } elseif ($transaction->jenis === 'pengeluaran') {
                    $saldo -= $transaction->jumlah;
                }
            }
            
            $dataPoints[] = [
                'date' => $currentDate->toDateString(),
                'saldo' => $saldo,
            ];
            
            $currentDate->addDay();
        }

        return [
            'labels' => array_column($dataPoints, 'date'),
            'datasets' => [
                [
                    'label' => 'Saldo Harian',
                    'data' => array_column($dataPoints, 'saldo'),
                    'borderColor' => '#4CAF50',
                    'backgroundColor' => 'rgba(76, 175, 80, 0.2)',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

}
