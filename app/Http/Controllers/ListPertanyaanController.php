<?php

namespace App\Http\Controllers;

use App\Models\BasisPengetahuan;
use App\Models\GejalaPenyakit;
use App\Models\HasilPerhitungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class ListPertanyaanController extends Controller
{
    public function index()
    {
        $data['pasien'] = HasilPerhitungan::orderBy('id','DESC')->first();
        $items = GejalaPenyakit::with('basis')->get();
        $data['chunks'] = $items->chunk(10);
        $data['count'] = GejalaPenyakit::with('basis')->count();
        // $data['kode_basis'] =  $data['data']->unique('kode_basis_pengetahuan');
        return view('list-pertanyaan',$data);
    }
    // public function save(Request $request)
    // {
    //     return $request;
    //     $data = array();
    //     // tidak
    //     if ($request->has('tidak')) {
    //         for ($i=0; $i < count($request->get('tidak')) ; $i++) {
    //             array_push($data,[
    //                 'cf_hasil' => (int)$request->get('tidak')[$i] * 1,
    //             ]);
    //         }
    //     }
    //     // tidak_yakin
    //     if ($request->has('tidak_yakin')) {
    //         for ($i=0; $i < count($request->get('tidak_yakin')) ; $i++) {
    //             array_push($data,[
    //                 'cf_hasil' => $request->get('tidak_yakin')[$i] * 1,
    //             ]);
    //         };
    //     }
    //     // mungkin
    //     if ($request->has('mungkin')) {
    //         for ($i=0; $i < count($request->get('mungkin')) ; $i++) {
    //             array_push($data,[
    //                 'cf_hasil' => $request->get('mungkin')[$i] * 1,
    //             ]);
    //         };
    //     }
    //     // kemungkinan_besar
    //     if ($request->has('kemungkinan_besar')) {
    //         for ($i=0; $i < count($request->get('kemungkinan_besar')) ; $i++) {
    //             array_push($data,[
    //                 'cf_hasil' => $request->get('kemungkinan_besar')[$i] * 1,
    //             ]);
    //         };
    //     }
    //     // hampir_pasti
    //     if ($request->has('hampir_pasti')) {
    //         for ($i=0; $i < count($request->get('hampir_pasti')) ; $i++) {
    //             array_push($data,[
    //                 'cf_hasil' => $request->get('hampir_pasti')[$i] * 1,
    //             ]);
    //         };
    //     }
    //     // pasti
    //     if ($request->has('pasti')) {
    //         for ($i=0; $i < count($request->get('pasti')) ; $i++) {
    //             array_push($data,[
    //                 'cf_hasil' => $request->get('pasti')[$i] * 1,
    //             ]);
    //         };
    //     }
    //     return $data;

    //    return $this->hitung_cf($data) * 100;
    // }
    public function save(Request $request)
    {
        $filteredArray = $request->post('kondisi');
        $kondisi = array_filter($filteredArray, function ($value) {
            return $value !== null;
        });

        $kodeGejala = [];
        $bobotPilihan = [];
        foreach ($kondisi as $key => $val) {
            if ($val != "#") {

                array_push($kodeGejala, $key);
                array_push($bobotPilihan, $val);
            }
        };
        $hcf = 0;
        $dataCF = [
            "cf" => [],
        ];
        $ruleSetiapDepresi = GejalaPenyakit::whereIn("kode_gejala", $kodeGejala)->get();
        foreach ($ruleSetiapDepresi as $ruleKey => $item) {
            $hcf = $bobotPilihan[$ruleKey] * 1;
            array_push($dataCF["cf"], $hcf);
            // array_push($cfArr["kode_depresi"], $ruleKey->kode_depresi);
        }
        $res = $this->getGabunganCf($dataCF)['value'] * 100;
        $data_pasien = HasilPerhitungan::find($request->get('id_pasien'));
        $new = HasilPerhitungan::findOrFail($request->get('id_pasien'));
        $new->tanggal = now();
        $new->nama_pasien = $data_pasien->nama_pasien;
        $new->gejala = $ruleSetiapDepresi;
        $new->persentase = $res;
        $new->update();
        $data['data_pasien'] = HasilPerhitungan::find($request->get('id_pasien'));
        $data['gejala'] = json_decode($data['data_pasien']->gejala, true);
        return view('hasil-perhitungan',$data);



    }
    public function getGabunganCf($cfArr)
    {
        if (!$cfArr["cf"]) {
            return 0;
        }
        if (count($cfArr["cf"]) == 1) {
            return [
                "value" => strval($cfArr["cf"][0]),
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
