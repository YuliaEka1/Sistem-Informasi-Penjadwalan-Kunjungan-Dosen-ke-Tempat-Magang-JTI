<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = "dosen";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'nama_dosen', 'nip', 'jumlah_bimbingan', 'no_hp'
    ];
}
