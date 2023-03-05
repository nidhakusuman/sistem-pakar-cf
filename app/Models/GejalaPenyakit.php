<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GejalaPenyakit extends Model
{
    use HasFactory;
    protected $table = 'genjala_penyakit';

    public function basis()
    {
        return $this->belongsTo(BasisPengetahuan::class, 'kode_basis_pengetahuan', 'id');
    }
}
