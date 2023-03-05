<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class KonsultasiController extends Controller
{
    public function index()
    {
        return view('konsultasi');
    }

    public function post(Request $request)
    {
        $request->session()->put('tgl', $request->get('tgl'));
        $request->session()->put('nama', $request->get('nama'));
        return redirect()->route('list-pertanyaan');
    }
}
