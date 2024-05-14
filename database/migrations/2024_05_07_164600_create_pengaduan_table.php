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
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id('pengaduan_id');
            $table->string('judul_pengaduan', 255)->nullable();
            $table->text('isi_pengaduan')->nullable();
            $table->date('tanggal_pengaduan')->nullable();
            $table->foreignId('pengirim_id')->nullable()->constrained('pengirim', 'pengirim_id');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};
