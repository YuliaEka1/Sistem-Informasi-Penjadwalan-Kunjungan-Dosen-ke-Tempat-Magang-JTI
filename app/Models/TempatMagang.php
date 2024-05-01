<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatMagang extends Model
{
    protected $table = "tempatMagang";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'nama_industri', 'no_hp', 'alamat_industri'
    ];
}
