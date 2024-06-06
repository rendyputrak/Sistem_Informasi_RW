<?php

namespace App\SPK;

use App\Models\Bansos;

class MetodeSAW
{
    private $weights = [
        'penghasilan' => 0.3,
        'pengeluaran' => 0.2,
        'status_rumah' => 0.2,
        'luas_rumah' => 0.1,
        'tanggungan' => 0.2,
    ];

    private $criteria = [
        'penghasilan' => [
            'Dibawah Rp.500.000' => 5,
            'Rp.500.000 - Rp.1.000.000' => 4,
            'Rp.1.000.001 - Rp.2.000.000' => 3,
            'Rp.2.000.001 - Rp.3.000.000' => 2,
            'Diatas Rp.3.000.000' => 1,
        ],
        'pengeluaran' => [
            'Dibawah Rp.500.000' => 1,
            'Rp.500.000 - Rp.1.000.000' => 2,
            'Rp.1.000.001 - Rp.2.000.000' => 3,
            'Rp.2.000.001 - Rp.3.000.000' => 4,
            'Diatas Rp.3.000.000' => 5,
        ],
        'status_rumah' => [
            'Hak Milik' => 1,
            'Sewa/Kontrak/Kos' => 2,
            'Hibah/Warisan' => 3,
            'Wakaf' => 4,
            'Bantuan Pemerintah' => 5,
        ],
        'luas_rumah' => [
            'Dibawah 50' => 5,
            '51-100' => 4,
            '101-150' => 3,
            '151-200' => 2,
            'Diatas 200' => 1,
        ],
        'tanggungan' => [
            '2 Orang atau kurang' => 1,
            '3-4 Orang' => 2,
            '5-6 Orang' => 3,
            '7-8 Orang' => 4,
            'Diatas 8 Orang' => 5,
        ],
    ];

    public function calculateSAW()
    {
        $bansosData = Bansos::where('status_pengajuan', 'Diajukan')->get();

        // Step 1: Normalisasi data dengan SAW
        $normalizedData = [];
        foreach ($bansosData as $data) {
            $normalizedRow = [];
            foreach ($this->criteria as $criteria => $values) {
                $normalizedRow[$criteria] = $values[$data->$criteria];
            }
            $normalizedData[] = $normalizedRow;
        }

        // Step 2: Hitung bobot normalisasi
        $weightedData = [];
        foreach ($normalizedData as $row) {
            $weightedRow = [];
            foreach ($row as $criteria => $value) {
                $weightedRow[$criteria] = $value * $this->weights[$criteria];
            }
            $weightedData[] = $weightedRow;
        }

        // Step 3: Tentukan solusi ideal positif dan negatif
        $idealPositive = [];
        $idealNegative = [];
        foreach (array_keys($this->criteria) as $criteria) {
            $columnValues = array_column($weightedData, $criteria);
            $idealPositive[$criteria] = max($columnValues);
            $idealNegative[$criteria] = min($columnValues);
        }

        // Step 4: Hitung jarak ke solusi ideal positif dan negatif
        $distances = [];
        foreach ($weightedData as $index => $row) {
            $positiveDistance = 0;
            $negativeDistance = 0;
            foreach ($row as $criteria => $value) {
                $positiveDistance += pow($value - $idealPositive[$criteria], 2);
                $negativeDistance += pow($value - $idealNegative[$criteria], 2);
            }
            $distances[$index]['positive'] = sqrt($positiveDistance);
            $distances[$index]['negative'] = sqrt($negativeDistance);
        }

        // Step 5: Hitung nilai preferensi TOPSIS
        $preferences = [];
        foreach ($distances as $index => $distance) {
            $preferences[$index] = [
                'id' => $bansosData[$index]->penduduk->nama,
                'preference' => $distance['negative'] / ($distance['positive'] + $distance['negative']),
            ];
        }

        // Sort preferences
        usort($preferences, function ($a, $b) {
            return $b['preference'] <=> $a['preference'];
        });

        return [
            'bansosData' => $bansosData,
            'normalizedData' => $normalizedData,
            'weightedData' => $weightedData,
            'idealPositive' => $idealPositive,
            'idealNegative' => $idealNegative,
            'distances' => $distances,
            'preferences' => $preferences,
        ];
    }
}
