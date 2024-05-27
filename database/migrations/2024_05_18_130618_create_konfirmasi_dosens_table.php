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
            $table->unsignedBigInteger('penjadwalan_id');
            $table->foreign('penjadwalan_id')->references('id')->on('penjadwalan')->onDelete('cascade');
            $table->string('status_kunjungan')->nullable();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konfirmasi_dosens');
    }
};
