<?php

namespace App\Http\Controllers;

use App\Models\BasisPengetahuan;
use App\Models\GejalaPenyakit;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class GejalaPenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['data'] = GejalaPenyakit::with('basis')->get();
        $data['kode_basis'] =  $data['data']->unique('kode_basis_pengetahuan');
        return view('backend.gejala-penyakit.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['kategori'] = BasisPengetahuan::all();
        return view('backend.gejala-penyakit.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:gejala_penyakit,kode_gejala',
            'kode_pengetahuan' => 'required',
            'nama_gejala' => 'required',
        ]);
        try {
            $gejala = new GejalaPenyakit;
            $gejala->kode_gejala = $request->get('kode');
            $gejala->kode_basis_pengetahuan = $request->get('kode_pengetahuan');
            $gejala->nama_gejala = $request->get('nama_gejala');
            $gejala->nilai_pakar = $request->get('nilai_pakar');
            $gejala->save();
            return redirect()->route('gejala-penyakit.index')->withStatus('Berhasil mendapatkan data');
        } catch (Exception $e) {
            return redirect()->route('gejala-penyakit.index')->withError('Terjadi Kesalahan');
        } catch (QueryException $e){
            return redirect()->route('gejala-penyakit.index')->withError('Terjadi Kesalahan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['kategori'] = BasisPengetahuan::all();
        $data['data'] = GejalaPenyakit::find($id);
        return view('backend.gejala-penyakit.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gejala = GejalaPenyakit::find($id);
        $isUniqueKodeAkun = $gejala->kode_gejala == $request->get('kode') ? '' : '|unique:gejala_penyakit,kode_gejala';
        $request->validate([
            'kode' => 'required'.$isUniqueKodeAkun,
            'kode_pengetahuan' => 'required',
            'nama_gejala' => 'required',
        ]);
        try {
            $gejala =  GejalaPenyakit::findOrFail($id);
            $gejala->kode_gejala = $request->get('kode');
            $gejala->kode_basis_pengetahuan = $request->get('kode_pengetahuan');
            $gejala->nama_gejala = $request->get('nama_gejala');
            $gejala->nilai_pakar = $request->get('nilai_pakar');
            $gejala->update();
            return redirect()->route('gejala-penyakit.index')->withStatus('Berhasil mendapatkan data');
        } catch (Exception $e) {
            return redirect()->route('gejala-penyakit.index')->withError('Terjadi Kesalahan');
        } catch (QueryException $e){
            return redirect()->route('gejala-penyakit.index')->withError('Terjadi Kesalahan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        GejalaPenyakit::findOrFail($id)->delete();
        return redirect()->route('gejala-penyakit.index')->withStatus('Berhasil hapus data.');
    }
}
