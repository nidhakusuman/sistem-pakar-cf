<?php

namespace App\Http\Controllers;

use App\Models\BasisPengetahuan;
use App\Models\HasilPerhitungan;
use App\Models\NilaiPerhitunganModel;
use Illuminate\Http\Request;

class DataPasienController extends Controller
{
    public function index()
    {
        $data['nama_penyakit'] = BasisPengetahuan::get();
        $data['count_data'] = [];
        $data['pasien'] = [];
        foreach ($data['nama_penyakit'] as $key => $value) {
            $count = HasilPerhitungan::where('kode_penyakit',$value->kode_pengetahuan)->count();
            // array_push($data['pasien'],$pasien);
            array_push($data['count_data'],$count);
        }
        $data['pasien'] = HasilPerhitungan::groupBy('nama_pasien')->get();
        return view('backend.data-pasien.index',$data);
    }
}
