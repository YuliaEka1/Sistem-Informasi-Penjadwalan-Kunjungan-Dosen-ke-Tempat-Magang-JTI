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
        Schema::create('dosen', function (Blueprint $table) {
            $table->bigIncrements('id'); // Kolom id sebagai primary key
            $table->string('nama_dosen', 100)->notNull();
            $table->string('nip', 20)->nullable(); // Tambah kolom NIP
            $table->integer('jumlah_bimbingan')->nullable();
            $table->string('no_hp', 20)->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
