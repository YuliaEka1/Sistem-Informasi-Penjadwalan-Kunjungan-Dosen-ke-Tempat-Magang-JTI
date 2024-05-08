<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekomendasiIndustri extends Model
{
    protected $table = 'rekomendasi_industri';
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'mahasiswa_id',
        'kota_score',
        'dosen_score',
        'dana_kunjungan_score',
        'kunjungan_score',
        'total_score',
        'status'
    ];
    
    public function mahasiswa()
    {
        
        return $this->hasMany(Mahasiswa::class);
    }
}
