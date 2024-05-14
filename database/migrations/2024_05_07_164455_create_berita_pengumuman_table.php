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
        Schema::create('berita_pengumuman', function (Blueprint $table) {
            $table->id('berita_pengumuman_id');
            $table->string('judul', 255)->nullable();
            $table->text('isi')->nullable();
            $table->enum('jenis', ['berita', 'pengumuman'])->nullable();
            $table->date('tanggal_posting')->nullable();
            $table->foreignId('admin_id')->constrained('admin', 'admin_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita_pengumuman');
    }
};
