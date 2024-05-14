<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Penjadwalan extends Model
{
    protected $table = 'penjadwalan';
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'mahasiswa_id',
        'tanggal_kunjungan'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
    // Relasi dengan model KonfirmasiIndustri
    public function konfirmasi()
    {
        return $this->hasOne(KonfirmasiIndustri::class, 'penjadwalan_id');
    }
    // Relasi dengan model KonfirmasiDosen
    public function konfirmasiDosen()
    {
        return $this->hasOne(KonfirmasiDosen::class, 'penjadwalan_id');
    }
}
