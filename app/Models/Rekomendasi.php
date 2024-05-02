<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekomendasi extends Model
{
    protected $table = "rekomendasi";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'mahasiswa_id', 'project_dikerjakan', 'jarak_polinema', 'dosen_pembimbing', 'jenis_perusahaan', 'kunjungan_industri', 'kategori_project', 'dana_kunjungan', 'mou_dengan_polinema'
    ];
    
}
