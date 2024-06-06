<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skor SAW + TOPSIS Penerima Bansos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Skor SAW + TOPSIS Penerima Bansos</h1>

        <h2>Data Bansos</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Alternatif (Pengaju)</th>
                    <th>Penghasilan</th>
                    <th>Pengeluaran</th>
                    <th>Status Rumah</th>
                    <th>Luas Rumah (Satuan Meter Persegi)</th>
                    <th>Tanggungan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bansosData as $data)
                    <tr>
                        <td>{{ $data->penduduk->nama }}</td>
                        <td>{{ $data->penghasilan }}</td>
                        <td>{{ $data->pengeluaran }}</td>
                        <td>{{ $data->status_rumah }}</td>
                        <td>{{ $data->luas_rumah }}</td>
                        <td>{{ $data->tanggungan }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Data Normalisasi</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Alternatif (Pengaju)</th>
                    <th>Penghasilan</th>
                    <th>Pengeluaran</th>
                    <th>Status Rumah</th>
                    <th>Luas Rumah (Satuan Meter Persegi)</th>
                    <th>Tanggungan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($normalizedData as $index => $row)
                    <tr>
                        <td>{{ $bansosData[$index]->id }}</td>
                        <td>{{ $row['penghasilan'] }}</td>
                        <td>{{ $row['pengeluaran'] }}</td>
                        <td>{{ $row['status_rumah'] }}</td>
                        <td>{{ $row['luas_rumah'] }}</td>
                        <td>{{ $row['tanggungan'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Data Bobot Normalisasi</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Alternatif (Pengaju)</th>
                    <th>Penghasilan</th>
                    <th>Pengeluaran</th>
                    <th>Status Rumah</th>
                    <th>Luas Rumah (Satuan Meter Persegi)</th>
                    <th>Tanggungan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($weightedData as $index => $row)
                    <tr>
                        <td>{{ $bansosData[$index]->id }}</td>
                        <td>{{ $row['penghasilan'] }}</td>
                        <td>{{ $row['pengeluaran'] }}</td>
                        <td>{{ $row['status_rumah'] }}</td>
                        <td>{{ $row['luas_rumah'] }}</td>
                        <td>{{ $row['tanggungan'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Solusi Ideal Positif</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Penghasilan</th>
                    <th>Pengeluaran</th>
                    <th>Status Rumah</th>
                    <th>Luas Rumah</th>
                    <th>Tanggungan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $idealPositive['penghasilan'] }}</td>
                    <td>{{ $idealPositive['pengeluaran'] }}</td>
                    <td>{{ $idealPositive['status_rumah'] }}</td>
                    <td>{{ $idealPositive['luas_rumah'] }}</td>
                    <td>{{ $idealPositive['tanggungan'] }}</td>
                </tr>
            </tbody>
        </table>

        <h2>Solusi Ideal Negatif</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Penghasilan</th>
                    <th>Pengeluaran</th>
                    <th>Status Rumah</th>
                    <th>Luas Rumah</th>
                    <th>Tanggungan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $idealNegative['penghasilan'] }}</td>
                    <td>{{ $idealNegative['pengeluaran'] }}</td>
                    <td>{{ $idealNegative['status_rumah'] }}</td>
                    <td>{{ $idealNegative['luas_rumah'] }}</td>
                    <td>{{ $idealNegative['tanggungan'] }}</td>
                </tr>
            </tbody>
        </table>

        <h2>Jarak ke Solusi Ideal</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Alternatif (Pengaju)</th>
                    <th>Jarak ke Positif</th>
                    <th>Jarak ke Negatif</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($distances as $index => $distance)
                    <tr>
                        <td>{{ $bansosData[$index]->penduduk->nama }}</td>
                        <td>{{ $distance['positive'] }}</td>
                        <td>{{ $distance['negative'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Perankingan</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Alternatif (Pengaju)</th>
                    <th>Nilai Preferensi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($preferences as $preference)
                    <tr>
                        <td>{{ $preference['id'] }}</td>
                        <td>{{ $preference['preference'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

