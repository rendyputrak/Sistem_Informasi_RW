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
        Schema::create('keuangan', function (Blueprint $table) {
            $table->id('keuangan_id');
            $table->enum('jenis', ['pemasukan', 'pengeluaran'])->nullable();
            $table->text('keterangan')->nullable();
            $table->decimal('jumlah', 10, 2)->nullable();
            $table->date('tanggal')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keuangan');
    }
};
