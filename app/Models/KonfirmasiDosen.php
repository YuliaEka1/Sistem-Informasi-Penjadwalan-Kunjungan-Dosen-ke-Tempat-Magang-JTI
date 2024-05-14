<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonfirmasiDosen extends Model
{
    protected $table = 'konfirmasi_dosen';
    protected $fillable = [
        'konfirmasi_industri_id',
        'status',
    ];

    public function konfirmasiIndustri()
    {
        return $this->belongsTo(KonfirmasiIndustri::class);
    }

    // Relasi dengan model Penjadwalan
    public function penjadwalan()
    {
        return $this->belongsTo(Penjadwalan::class);
    }

    // Relasi dengan model Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
    
}
