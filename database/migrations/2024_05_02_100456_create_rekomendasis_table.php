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
        Schema::create('rekomendasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('mahasiswa');
            $table->enum('project_dikerjakan', ['tdk_mendukung', 'terbatas']);
            $table->enum('jarak_polinema', ['luar_jawa', 'wilayah_jawa']);
            $table->enum('dosen_pembimbing', ['tidak_ada', 'ada']);
            $table->enum('jenis_perusahaan', ['kecil_sedang', 'besar']);
            $table->enum('kunjungan_industri', ['sudah_dikunjungi', 'belum_dikunjungi']);
            $table->enum('kategori_project', ['hanya_1', 'lebih_dari_3']);
            $table->enum('dana_kunjungan', ['tidak_termasuk', 'termasuk']);
            $table->enum('mou_dengan_polinema', ['belum_mou', 'sudah_mou']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekomendasi');
    }
};

