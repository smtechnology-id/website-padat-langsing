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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('tanggal');
            $table->string('jumlah_dimakan');
            $table->string('foto_jumlah_dimakan');
            $table->string('alasan');
            $table->string('jumlah_tidak_dimakan');
            $table->string('foto_jumlah_tidak_dimakan');
            $table->string('pertanyaan_tambahan');
            $table->string('jenis_pasien');
            $table->timestamps();
            
            // Menambahkan kolom untuk kunci asing
            $table->foreign('user_id')->references('id')->on('users');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
