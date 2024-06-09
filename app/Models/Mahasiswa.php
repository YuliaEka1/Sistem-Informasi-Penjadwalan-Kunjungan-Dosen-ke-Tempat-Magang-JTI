<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = "mahasiswa";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'user_id', 'industri_id', 'nama_mhs', 'nama_mhs_2', 'nama_mhs_3', 'nim', 'nim_2', 'nim_3',
        'durasi_magang', 'tgl_awal', 'tgl_akhir', 'kategori_magang',
        'jenis_magang', 'nama_industri', 'no_pemlap', 'dosen_id', 'no_mahasiswa',
        'alamat_industri', 'kota'
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function mhs()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function industri()
    {
        return $this->belongsTo(User::class, 'industri_id');
    }

    public function rekomendasi()
    {
        return $this->hasOne(RekomendasiIndustri::class);
    }

    public function konfirmasiIndustri()
    {
        return $this->hasOne(KonfirmasiIndustri::class);
    }

    public function penjadwalan()
    {
        return $this->hasOne(Penjadwalan::class);
    }
}
