<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonfirmasiIndustri extends Model
{
    protected $table = 'konfirmasi_industri';

    protected $fillable = [
        'penjadwalan_id',
        'status',
    ];

    // Relasi dengan model Penjadwalan
    public function penjadwalan()
    {
        return $this->belongsTo(Penjadwalan::class);
    }

    // Relasi dengan model Mahasiswa (jika diperlukan)
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
