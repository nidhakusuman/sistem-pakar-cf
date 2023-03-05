<?php

namespace App\Http\Controllers;

use App\Models\BasisPengetahuan;
use App\Models\GejalaPenyakit;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class BasisPengetahuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['data'] = BasisPengetahuan::all();
        return view('backend.basis-pengetahuan.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.basis-pengetahuan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:basis_pengetahuan,kode_pengetahuan',
            'usia' => 'required',
        ]);
        try {
            $basis = new BasisPengetahuan;
            $basis->kode_pengetahuan = $request->get('kode');
            $basis->keterangan_usia = $request->get('usia');
            $basis->save();
            return redirect()->route('basis-pengetahuan.index')->withStatus('Berhasil Menambahkan Data.');
        } catch (Exception $e) {
            return redirect()->route('basis-pengetahuan.index')->withError('Terjadi Kesalahan');
        } catch (QueryException $e){
            return redirect()->route('basis-pengetahuan.index')->withError('Terjadi Kesalahan');
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
        $data['data'] = BasisPengetahuan::find($id);
        return view('backend.basis-pengetahuan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $basis_pengetahuan = BasisPengetahuan::find($id);
        $isUniqueKodeAkun = $basis_pengetahuan->kode_pengetahuan == $request->get('kode') ? '' : '|unique:basis_pengetahuan,kode_pengetahuan';
        $request->validate([
            'kode' => 'required'.$isUniqueKodeAkun,
            'usia' => 'required',
        ]);
        try {
            $basis = BasisPengetahuan::findOrFail($id);
            $basis->kode_pengetahuan = $request->get('kode');
            $basis->keterangan_usia = $request->get('usia');
            $basis->update();
            return redirect()->route('basis-pengetahuan.index')->withStatus('Berhasil Mengganti Data.');
        } catch (Exception $e) {
            return redirect()->route('basis-pengetahuan.index')->withError('Terjadi Kesalahan');
        } catch (QueryException $e){
            return redirect()->route('basis-pengetahuan.index')->withError('Terjadi Kesalahan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        BasisPengetahuan::findOrFail($id)->delete();
        return redirect()->route('basis-pengetahuan.index')->withStatus('Berhasil hapus data.');
    }
}
