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
        Schema::create('agenda_acara', function (Blueprint $table) {
            $table->id('agenda_acara_id');
            $table->string('nama_acara', 255)->nullable();
            $table->date('tanggal')->nullable();
            $table->time('waktu')->nullable();
            $table->string('lokasi', 255)->nullable();
            $table->text('deskripsi')->nullable();
            $table->foreignId('admin_id')->constrained('admin', 'admin_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agenda_acara');
    }
};
