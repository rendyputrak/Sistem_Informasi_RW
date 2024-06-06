<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bansos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penduduk_id')->constrained('penduduk', 'penduduk_id');
            $table->enum('penghasilan', ['Dibawah Rp.500.000', 'Rp.500.000 - Rp.1.000.000', 'Rp.1.000.001 - Rp.2.000.000', 'Rp.2.000.001 - Rp.3.000.000', 'Diatas Rp.3.000.000']);
            $table->string('foto_gaji', 255);
            $table->enum('luas_rumah', ['Dibawah 50', '51-100', '101-150', '151-200', 'Diatas 200']);
            $table->string('foto_rumah', 255);
            $table->enum('tanggungan', ['2 Orang atau kurang', '3-4 Orang', '5-6 Orang', '7-8 Orang', 'Diatas 8 Orang']);
            $table->date('tanggal_pengajuan');
            $table->enum('status_pengajuan', ['Diajukan', 'Disetujui', 'Ditolak']);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bansos');
    }
};
