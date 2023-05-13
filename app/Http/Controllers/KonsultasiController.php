<?php

namespace App\Http\Controllers;

use App\Models\HasilPerhitungan;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

use function Pest\Laravel\json;

class KonsultasiController extends Controller
{
    public function index()
    {
        return view('konsultasi');
    }

    public function post(Request $request)
    {
        $new = new HasilPerhitungan;
        $new->tanggal = now();
        $new->nama_pasien = $request->get('nama');
        $new->status_usia = $request->get('status_usia');
        $new->save();
        return redirect()->route('list-pertanyaan');
    }
}
