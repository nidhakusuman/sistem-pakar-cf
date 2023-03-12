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
        Schema::create('hasil_nilai_perhitungan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_penyakit');
            $table->string('kode_gejala');
            $table->double('nilai_cfhe');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_nilai_perhitungan');
    }
};
