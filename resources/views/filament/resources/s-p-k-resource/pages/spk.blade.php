<x-filament-panels::page>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perhitungan SPK</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </head>

    <div class="container mt-5">
        <h1 class="mb-4">Perhitungan SPK dengan Metode SAW dan TOPSIS</h1>
        
        <h2>Bobot Kriteria</h2>
        <div class="modal fade" id="modalBobotKriteria" tabindex="-1" role="dialog" aria-labelledby="modalBobotKriteriaLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalBobotKriteriaLabel">Bobot Kriteria</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Kriteria</th>
                                    <th>Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bobot as $kriteria => $value)
                                <tr>
                                    <td>{{ ucfirst($kriteria) }}</td>
                                    <td>{{ $value }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBobotKriteria">
            Tampilkan Bobot Kriteria
        </button>

        <div style="margin-bottom: 20px;"></div>

        <h2>Nilai Kriteria Penghasilan</h2>
        <div class="modal fade" id="modalNilaiKriteriaPenghasilan" tabindex="-1" role="dialog" aria-labelledby="modalNilaiKriteriaPenghasilanLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalNilaiKriteriaPenghasilanLabel">Nilai Kriteria Penghasilan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Range Kriteria Penghasilan (Per Bulan)</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($penghasilan as $kriteria => $value)
                                <tr>
                                    <td>{{ ucfirst($kriteria) }}</td>
                                    <td>{{ $value }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNilaiKriteriaPenghasilan">
            Tampilkan Nilai Kriteria Penghasilan
        </button>

        <div style="margin-bottom: 20px;"></div>

        <h2>Nilai Kriteria Pengeluaran</h2>
        <div class="modal fade" id="modalNilaiKriteriaPengeluaran" tabindex="-1" role="dialog" aria-labelledby="modalNilaiKriteriaPengeluaranLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalNilaiKriteriaPengeluaranLabel">Nilai Kriteria Pengeluaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Range Kriteria Pengeluaran (Per Bulan)</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pengeluaran as $kriteria => $value)
                                <tr>
                                    <td>{{ ucfirst($kriteria) }}</td>
                                    <td>{{ $value }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNilaiKriteriaPengeluaran">
            Tampilkan Nilai Kriteria Pengeluaran
        </button>
        
        <div style="margin-bottom: 20px;"></div>

        <h2>Nilai Kriteria Status Rumah</h2>
        <div class="modal fade" id="modalNilaiKriteriaStatusRumah" tabindex="-1" role="dialog" aria-labelledby="modalNilaiKriteriaStatusRumahLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalNilaiKriteriaStatusRumahLabel">Nilai Kriteria Status Rumah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Range Kriteria Status Rumah (Kepemilikan)</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($status_rumah as $kriteria => $value)
                                <tr>
                                    <td>{{ ucfirst($kriteria) }}</td>
                                    <td>{{ $value }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNilaiKriteriaStatusRumah">
            Tampilkan Nilai Kriteria Status Rumah
        </button>
        
        <div style="margin-bottom: 20px;"></div>

        <h2>Nilai Kriteria Luas Rumah</h2>
        <div class="modal fade" id="modalNilaiKriteriaLuasRumah" tabindex="-1" role="dialog" aria-labelledby="modalNilaiKriteriaLuasRumahLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalNilaiKriteriaLuasRumahLabel">Nilai Kriteria Luas Rumah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Range Kriteria Luas Rumah (Satuan M2)</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($luas_rumah as $kriteria => $value)
                                <tr>
                                    <td>{{ ucfirst($kriteria) }}</td>
                                    <td>{{ $value }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNilaiKriteriaLuasRumah">
            Tampilkan Nilai Kriteria Luas Rumah
        </button>
        
        <div style="margin-bottom: 20px;"></div>

        <h2>Nilai Kriteria Tanggungan</h2>
        <div class="modal fade" id="modalNilaiKriteriaTanggungan" tabindex="-1" role="dialog" aria-labelledby="modalNilaiKriteriaTanggunganLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalNilaiKriteriaTanggunganLabel">Nilai Kriteria Tanggungan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Range Kriteria Tanggungan</th>
                                    <th>Nilai</th>
                                </tr
                            </thead>
                            <tbody>
                                @foreach($tanggungan as $kriteria => $value)
                                <tr>
                                    <td>{{ ucfirst($kriteria) }}</td>
                                    <td>{{ $value }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNilaiKriteriaTanggungan">
            Tampilkan Nilai Kriteria Tanggungan
        </button>

        <div style="margin-bottom: 50px;"></div>

        <h2>Normalisasi Data</h2>
        <p>Data normalisasi dilakukan dengan mengubah nilai kriteria menjadi skala numerik berdasarkan tabel kriteria.</p>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nama</th>
                @foreach(array_keys($datanormalisasi[0]) as $kriteria)
                    <th>{{ ucfirst($kriteria) }}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach($datanormalisasi as $index => $data)
                <tr>
                    <td>{{ $bansosData[$index]->penduduk->nama }}</td>
                    @foreach($data as $value)
                        <td>{{ $value }}</td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    
        <h2>Hitung Bobot Normalisasi</h2>
        <p>Setiap nilai normalisasi dikalikan dengan bobot kriteria.</p>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nama</th>
                @foreach(array_keys($weightedData[0]) as $kriteria)
                    <th>{{ ucfirst($kriteria) }}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach($weightedData as $index => $data)
                <tr>
                    <td>{{ $bansosData[$index]->penduduk->nama }}</td>
                    @foreach($data as $kriteria => $value)
                        <td>{{ $datanormalisasi[$index][$kriteria] }} x {{ $this->bobot[$kriteria] }} = {{ $value }}</td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    
        <h2>Solusi Ideal Positif dan Negatif</h2>
        <p>Solusi ideal positif adalah nilai maksimal dari setiap kriteria, dan solusi ideal negatif adalah nilai minimal dari setiap kriteria.</p>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Kriteria</th>
                <th>Ideal Positif</th>
                <th>Ideal Negatif</th>
            </tr>
            </thead>
            <tbody>
            @foreach($idealpositif as $kriteria => $value)
                <tr>
                    <td>{{ ucfirst($kriteria) }}</td>
                    <td>{{ $value }}</td>
                    <td>{{ $idealnegatif[$kriteria] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    
        <h2>Jarak ke Solusi Ideal</h2>
        <p>Hitung jarak setiap alternatif ke solusi ideal positif dan negatif menggunakan rumus Euclidean Distance.</p>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Nama</th>
                <th>Jarak Positif</th>
                <th>Jarak Negatif</th>
            </tr>
            </thead>
            <tbody>
            @foreach($distances as $index => $distance)
                <tr>
                    <td>{{ $bansosData[$index]->penduduk->nama }}</td>
                    <td>{{ sqrt(array_sum(array_map(fn($kriteria) => pow($weightedData[$index][$kriteria] - $idealpositif[$kriteria], 2), array_keys($weightedData[$index])))) }}</td>
                    <td>{{ sqrt(array_sum(array_map(fn($kriteria) => pow($weightedData[$index][$kriteria] - $idealnegatif[$kriteria], 2), array_keys($weightedData[$index])))) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    
        <h2>Perankingan</h2>
        <p>Semakin tinggi nilai preferensi maka semakin besar kemungkinan pengajuan diterima</p>
        <p>Nilai preferensi dihitung dengan membagi jarak negatif dengan total jarak (positif + negatif).</p>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nilai Preferensi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($preferences as $rank => $preference)
                <tr>
                    <td>{{ $rank + 1 }}</td>
                    <td>{{ $preference['id'] }}</td>
                    <td>{{ $preference['preference'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-filament-panels::page>
