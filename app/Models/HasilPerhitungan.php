<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilPerhitungan extends Model
{
    use HasFactory;
    protected $table = 'hasil_perhitungan';
    protected $fillable =[
        'tanggal',
        'nama_pasien',
        'status_usia',
        'kode_penyakit',
        'nilai_akhir',
    ];
}

