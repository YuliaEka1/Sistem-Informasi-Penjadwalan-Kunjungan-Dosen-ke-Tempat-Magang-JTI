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
            $table->integer('durasi_magang'); // Misal, menggunakan integer untuk durasi magang
            $table->date('tgl_awal'); // Kolom tgl_awal sebagai tipe tanggal
            $table->date('tgl_akhir'); // Kolom tgl_akhir sebagai tipe tanggal
            $table->string('no_hp', 20);
            $table->string('kategori_magang', 100);
            $table->string('jenis_magang', 100);
            $table->foreignId('nama_dosen')->constrained('dosen'); // Foreign key dari tabel dosen
            $table->foreignId('alamat_industri')->constrained('tempat_magang'); // Foreign key dari tabel tempat_magang
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
