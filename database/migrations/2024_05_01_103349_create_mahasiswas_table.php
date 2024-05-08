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
            $table->string('nama_mhs', 100);
            $table->string('nim', 20);
            $table->string('kelas', 100);
            $table->integer('durasi_magang'); // Misal, menggunakan integer untuk durasi magang
            $table->date('tgl_awal'); // Kolom tgl_awal sebagai tipe tanggal
            $table->date('tgl_akhir'); // Kolom tgl_akhir sebagai tipe tanggal
            $table->string('kategori_magang', 100);
            $table->string('jenis_magang', 100);
            $table->string('nama_industri', 100);
            $table->string('no_pemlap', 20);
            $table->bigInteger('dosen_id');
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
