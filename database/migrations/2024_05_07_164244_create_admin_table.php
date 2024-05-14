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
        Schema::create('admin', function (Blueprint $table) {
            $table->id('admin_id');
            $table->string('nama', 50);
            $table->string('password', 255);
            $table->string('email', 255);
            $table->timestamps();
            $table->foreignId('level_id')->constrained('level', 'level_id');
            $table->foreignId('penduduk_id')->constrained('penduduk', 'penduduk_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
