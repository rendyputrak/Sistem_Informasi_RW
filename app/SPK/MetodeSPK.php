<?php

namespace App\SPK;

use App\Models\Bansos;

class MetodeSPK
{
    private $bobot = [
        'penghasilan' => 0.3,
        'pengeluaran' => 0.2,
        'status_rumah' => 0.2,
        'luas_rumah' => 0.1,
        'tanggungan' => 0.2,
    ];

    private $kriteria = [
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

    public function hitungSPK()
    {
        $bansosData = Bansos::where('status_pengajuan', 'Diajukan')->get();

        // Step 1: Normalisasi data dengan SAW
        $datanormalisasi = [];
        foreach ($bansosData as $data) {
            $barisnormalisasi = [];
            foreach ($this->kriteria as $kriteria => $values) {
                $barisnormalisasi[$kriteria] = $values[$data->$kriteria];
            }
            $datanormalisasi[] = $barisnormalisasi;
        }

        // Step 2: Hitung bobot normalisasi
        $weightedData = [];
        foreach ($datanormalisasi as $row) {
            $weightedRow = [];
            foreach ($row as $kriteria => $value) {
                $weightedRow[$kriteria] = $value * $this->bobot[$kriteria];
            }
            $weightedData[] = $weightedRow;
        }

        // Step 3: Tentukan solusi ideal positif dan negatif
        $idealpositif = [];
        $idealnegatif = [];
        foreach (array_keys($this->kriteria) as $kriteria) {
            $columnValues = array_column($weightedData, $kriteria);
            $idealpositif[$kriteria] = max($columnValues);
            $idealnegatif[$kriteria] = min($columnValues);
        }

        // Step 4: Hitung jarak ke solusi ideal positif dan negatif
        $distances = [];
        foreach ($weightedData as $index => $row) {
            $jarakpositif = 0;
            $jaraknegatif = 0;
            foreach ($row as $kriteria => $value) {
                $jarakpositif += pow($value - $idealpositif[$kriteria], 2);
                $jaraknegatif += pow($value - $idealnegatif[$kriteria], 2);
            }
            $distances[$index]['positive'] = sqrt($jarakpositif);
            $distances[$index]['negative'] = sqrt($jaraknegatif);
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
            'datanormalisasi' => $datanormalisasi,
            'weightedData' => $weightedData,
            'idealpositif' => $idealpositif,
            'idealnegatif' => $idealnegatif,
            'distances' => $distances,
            'preferences' => $preferences,
        ];
    }
}
