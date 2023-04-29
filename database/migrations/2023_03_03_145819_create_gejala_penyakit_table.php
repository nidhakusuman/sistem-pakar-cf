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
        Schema::create('gejala_penyakit', function (Blueprint $table) {
            $table->id();
            $table->string('kode_gejala')->uniqid();
            $table->string('nama_gejala');
            $table->double('nilai_pakar')->nullable();
            $table->timestamps();
            $table->foreignId('kode_basis_pengetahuan')->on('basis_pengetahuan')->refereces('id')->cascadeOnUpdate()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gejala_penyakit');
    }
};
