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
        Schema::create('konfirmasi_dosen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('konfirmasi_industri_id');
            $table->foreign('konfirmasi_industri_id')->references('id')->on('konfirmasi_industri')->onDelete('cascade');
            $table->string('status')->nullable();
            $table->timestamps();
            
            // Menambahkan index pada kolom foreign key
            $table->index('konfirmasi_industri_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konfirmasi_dosen');
    }
};
