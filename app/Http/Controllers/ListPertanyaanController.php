<?php

namespace App\Http\Controllers;

use App\Models\GejalaPenyakit;
use Illuminate\Http\Request;

class ListPertanyaanController extends Controller
{
    public function index()
    {
        $data['data'] = GejalaPenyakit::with('basis')->get();
        $data['kode_basis'] =  $data['data']->unique('kode_basis_pengetahuan');
        return view('list-pertanyaan',$data);
    }
}
