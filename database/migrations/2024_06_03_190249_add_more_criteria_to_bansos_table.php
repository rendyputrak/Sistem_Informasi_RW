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
        Schema::table('bansos', function (Blueprint $table) {
            $table->enum('status_rumah', ['Hak Milik', 'Sewa/Kontrak/Kos', 'Hibah/Warisan', 'Wakaf', 'Bantuan Pemerintah']);
            $table->enum('pengeluaran', ['Dibawah Rp.500.000', 'Rp.500.000 - Rp.1.000.000', 'Rp.1.000.001 - Rp.2.000.000', 'Rp.2.000.001 - Rp.3.000.000', 'Diatas Rp.3.000.000']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bansos', function (Blueprint $table) {
            $table->dropColumn('status_rumah');
            $table->dropColumn('pengeluaran');
        });
    }
};
