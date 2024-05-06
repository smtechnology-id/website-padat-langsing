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
        Schema::create('balita', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_anak');
            $table->string('nik');
            $table->date('tanggal_lahir');
            $table->string('nama_ibu');
            $table->integer('berat_badan');
            $table->integer('panjang_badan');
            $table->string('alamat');
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
        Schema::dropIfExists('balita');
    }
};
