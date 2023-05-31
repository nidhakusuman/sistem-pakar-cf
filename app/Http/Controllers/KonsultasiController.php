<?php

namespace App\Http\Controllers;

use App\Models\HasilPerhitungan;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;
use App\Models\BasisPengetahuan;

use function Pest\Laravel\json;

class KonsultasiController extends Controller
{
    public function index()
    {
        $data['umur'] = BasisPengetahuan::all();
        return view('konsultasi', $data);
    }

    public function post(Request $request)
    {
        
        $new = new HasilPerhitungan;
        $new->tanggal = now();
        $new->nama_pasien = $request->get('nama');
        $new->status_usia = $request->get('status_usia');
        $new->save();
        $basis = BasisPengetahuan::find($new->status_usia)->keterangan_usia;
        
        \Session::put('nama_usia',$basis); 
        return redirect()->route('list-pertanyaan');
    }
}
