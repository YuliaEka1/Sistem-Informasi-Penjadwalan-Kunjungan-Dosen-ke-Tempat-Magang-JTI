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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mhs');
            $table->string('nama_mhs_2')->nullable();
            $table->string('nama_mhs_3')->nullable();
            $table->string('nim', 20);
            $table->string('nim_2')->nullable();
            $table->string('nim_3')->nullable();
            $table->integer('durasi_magang'); 
            $table->date('tgl_awal'); 
            $table->date('tgl_akhir'); 
            $table->string('kategori_magang');
            $table->string('jenis_magang');
            $table->string('nama_industri');
            $table->string('no_pemlap', 20);
            $table->bigInteger('dosen_id')->nullable();
            $table->string('no_mahasiswa', 20);
            $table->string('alamat_industri'); 
            $table->string('kota', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
