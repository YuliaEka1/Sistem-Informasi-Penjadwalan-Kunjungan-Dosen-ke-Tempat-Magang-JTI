<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = "mahasiswa";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'nama_mhs', 'nim', 'kelas', 'durasi_magang', 'tgl_awal', 'tgl_akhir', 'kategori_magang', 'jenis_magang', 'nama_industri', 'no_pemlap', 'no_mahasiswa', 'alamat_industri', 'kota'
    ];
}
