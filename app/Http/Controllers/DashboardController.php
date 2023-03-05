<?php

namespace App\Http\Controllers;

use App\Models\BasisPengetahuan;
use App\Models\GejalaPenyakit;
use App\Models\HasilPerhitungan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['basis'] = BasisPengetahuan::count();
        $data['gejala'] = GejalaPenyakit::count();
        $data['pasien'] = HasilPerhitungan::count();
        return view('dashboard',$data);
    }
}
