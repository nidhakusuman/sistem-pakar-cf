<?php

namespace App\Http\Controllers;

use App\Models\BasisPengetahuan;
use App\Models\GejalaPenyakit;
use App\Models\HasilPerhitungan;
use App\Models\NilaiPerhitunganModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Session;

class ListPertanyaanController extends Controller
{
    public function index()
    {
        $data['pasien'] = HasilPerhitungan::orderBy('id','DESC')->first();
        Session::put('nama_user', $data['pasien']->nama_pasien);
        Session::put('id', $data['pasien']->id);
        $items = GejalaPenyakit::with('basis')->get();
        $data['chunks'] = $items->chunk(10);
        $data['count'] = GejalaPenyakit::with('basis')->count();
        // $data['kode_basis'] =  $data['data']->unique('kode_basis_pengetahuan');
        return view('list-pertanyaan',$data);
    }

    public function save(Request $request)
    {
        $filteredArray = $request->post('kondisi');
        $kondisi = array_filter($filteredArray, function ($value) {
            return $value !== null;
        });

        if ($kondisi == null) {
            return redirect()->route('konsultasi');
        }
        $kodeGejala = [];
        $bobotPilihan = [];
        $kode_penyakit = [];
        foreach ($kondisi as $key => $val) {
            if ($val != "#") {
                array_push($kode_penyakit,$this->pecahkode($key)[1]);
                array_push($kodeGejala, $this->pecahkode($key)[0]);
                array_push($bobotPilihan, $val);
            }
        };

        $hcf = 0;

        $dataNilaiHasilCFHE = [];
        $ruleSetiapDepresi = GejalaPenyakit::join('basis_pengetahuan','basis_pengetahuan.id','genjala_penyakit.kode_basis_pengetahuan')->whereIn("genjala_penyakit.kode_gejala", $kodeGejala)->whereIn('basis_pengetahuan.kode_pengetahuan',$kode_penyakit)->get();
        foreach ($ruleSetiapDepresi as $ruleKey => $item) {
            $hcf =  $item->nilai_pakar * $bobotPilihan[$ruleKey];
            if ($kode_penyakit[$ruleKey] == $item->kode_pengetahuan) {
                array_push($dataNilaiHasilCFHE,[
                    'kode_penyakit' => $kode_penyakit[$ruleKey],
                    'kode_gejala' => $kodeGejala[$ruleKey],
                    'nilai_cfe' => round($hcf,2),
                ]);
            }

        }
        foreach ($dataNilaiHasilCFHE as $key => $valueNilaiHasilCFHE) {
            $hasil = new NilaiPerhitunganModel;
            $hasil->kode_penyakit = $valueNilaiHasilCFHE['kode_penyakit'];
            $hasil->id_user = $request->get('id_pasien');
            $hasil->kode_gejala = $valueNilaiHasilCFHE['kode_gejala'];
            $hasil->nilai_cfhe = (float)$valueNilaiHasilCFHE['nilai_cfe'];
            $hasil->save();
        }
        $depresi = BasisPengetahuan::all();
        $cf = 0;
        // penyakit
        $arrGejala = [];
        for ($i = 0; $i < count($depresi); $i++) {
            $cfArr = [
                "cf" => [],
                "kode_penyakit" => []
            ];
            $res = 0;
            $ruleSetiapDepresi = NilaiPerhitunganModel::whereIn("kode_gejala", $kodeGejala)->where("kode_penyakit", $depresi[$i]->kode_pengetahuan)->get();
            // if ($i == 3) {
            //     return $ruleSetiapDepresi;
            // }
                // return count($ruleSetiapDepresi);
            if (count($ruleSetiapDepresi) > 0) {
                foreach ($ruleSetiapDepresi as $ruleKey) {
                    $cf = $ruleKey->nilai_cfhe;
                    array_push($cfArr["cf"], $cf);
                    array_push($cfArr["kode_penyakit"], $ruleKey->kode_penyakit);
                }
                $res = $this->getGabunganCf($cfArr);
                // return 'as';
                array_push($arrGejala,$res);
                // dd($res);
                // print "<br> res : $res <br>";
                // array_push($arrGejala, $cfArr);
            }else {
                continue;
            }
        }

        $hasil = [];
        $uniqueArr = array_values(array_unique($kode_penyakit));
        foreach ($arrGejala as $key => $value) {
            array_push($hasil,(float)$value['value']);
        }
        $record = HasilPerhitungan::where(['id'=>$request->get('id_pasien')]);
        if ($record->exists()) {
            $record->delete();
        }
        foreach ($hasil as $key => $value) {
            $new = new HasilPerhitungan;
            $new->tanggal = now();
            $new->nama_pasien = Session::get('nama_user');
            $new->kode_penyakit = $uniqueArr[$key];
            $new->nilai_akhir = $value;
            $new->save();

        }
        // return view('hasil-perhitungan',$data);
        return redirect()->route('diagnosa',["id" => $new->id]);



    }
    public function pecahkode($kode)
    {
        $kode = explode('-', $kode);
        return $kode;
    }

    public function getGabunganCf($cfArr)
    {
        if (!$cfArr["cf"]) {
            return 0;
        }
        if (count($cfArr["cf"]) == 1) {
            return [
                "value" => strval($cfArr["cf"][0]),
                "kode_penyakit" => $cfArr["kode_penyakit"][0]
            ];
        }


        $cfoldGabungan = $cfArr["cf"][0];

        // foreach ($cfArr["cf"] as $cf) {
        //     $cfoldGabungan = $cfoldGabungan + ($cf * (1 - $cfoldGabungan));
        // }

        for ($i = 0; $i < count($cfArr["cf"]) - 1; $i++) {
            $cfoldGabungan = $cfoldGabungan + ($cfArr["cf"][$i + 1] * (1 - $cfoldGabungan));
        }


        return [
            "value" => "$cfoldGabungan",
            "kode_penyakit" => $cfArr["kode_penyakit"][0]
        ];
    }
    public function hitung_cf($data)
    {
        $cf_old = 0;
        foreach ($data as $key => $value) {
            if ($key === 0) {
                $cf_old = $value['cf_hasil'];
            } else {
                $cf_old = $cf_old + $value['cf_hasil'] * (1 - $cf_old);
            }
        }

        return $cf_old;
    }
}
