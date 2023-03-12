<?php

namespace App\Http\Controllers;

use App\Models\BasisPengetahuan;
use App\Models\GejalaPenyakit;
use App\Models\HasilPerhitungan;
use App\Models\NilaiPerhitunganModel;
use Illuminate\Http\Request;

class HasilPerhitunganController extends Controller
{
    public function diagnosa($id)
    {
        $data = HasilPerhitungan::find($id);
        $filterData = HasilPerhitungan::where('nama_pasien',$data->nama_pasien)->get();
        $arrData = [];
        foreach ($filterData as $key => $value) {
            array_push($arrData,$value->nilai_akhir);
        }
        $data['nilai_ahir'] = max($arrData);
        $kode_penyakit = HasilPerhitungan::where('nilai_akhir',$data['nilai_akhir'])->where('nama_pasien',$data->nama_pasien)->first();
        $data['basis_pengetahuan'] = BasisPengetahuan::where('kode_pengetahuan', $kode_penyakit->kode_penyakit)->first();

        $data['getPenyakit'] = GejalaPenyakit::join('basis_pengetahuan','basis_pengetahuan.id','genjala_penyakit.kode_basis_pengetahuan')->where('basis_pengetahuan.kode_pengetahuan',$kode_penyakit->kode_penyakit)->get();
        $data['hasilNilai'] = NilaiPerhitunganModel::where('kode_penyakit',$kode_penyakit->kode_penyakit)->get();
        return view('hasil-perhitungan',$data);

    }
}
