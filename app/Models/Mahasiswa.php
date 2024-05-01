<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = "mahasiswa";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'nama_mhs', 'nim', 'durasi_magang', 'tgl_awal', 'tgl_akhir', 'no_hp', 'kategori_magang', 'jenis_magang', 'nama_dosen', 'alamat_industri'
    ];
}
