<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Persil;
use App\Models\Warga;
use Illuminate\Http\Request;

class PersilController extends Controller
{
    public function index()
    {
        $data = Persil::with('warga')->get();
        return view('pages.persil.index', compact('data'));
    }

    public function create()
    {
        $warga = Warga::all();
        return view('pages.persil.create', compact('warga'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_persil'       => 'required|unique:persil',
            'pemilik_warga_id'  => 'required',
            'luas_m2'           => 'required|numeric',
            'penggunaan'        => 'required',
            'alamat_lahan'      => 'required',
            'rt'                => 'required',
            'rw'                => 'required',
        ]);

        Persil::create([
            'kode_persil'       => $request->kode_persil,
            'pemilik_warga_id'  => $request->pemilik_warga_id,
            'luas_m2'           => $request->luas_m2,
            'penggunaan'        => $request->penggunaan,
            'alamat_lahan'      => $request->alamat_lahan,
            'rt'                => $request->rt,
            'rw'                => $request->rw,
        ]);

        return redirect()->route('persil.index')
            ->with('success', 'Data persil berhasil ditambahkan');
    }

    public function edit($id)
    {
        $persil = Persil::findOrFail($id);
        $warga  = Warga::all();

        return view('pages.persil.edit', compact('persil', 'warga'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_persil'       => 'required|unique:persil,kode_persil,' . $id . ',persil_id',
            'pemilik_warga_id'  => 'required',
            'luas_m2'           => 'required|numeric',
            'penggunaan'        => 'required',
            'alamat_lahan'      => 'required',
            'rt'                => 'required',
            'rw'                => 'required',
        ]);

        $persil = Persil::findOrFail($id);
        $persil->update([
            'kode_persil'       => $request->kode_persil,
            'pemilik_warga_id'  => $request->pemilik_warga_id,
            'luas_m2'           => $request->luas_m2,
            'penggunaan'        => $request->penggunaan,
            'alamat_lahan'      => $request->alamat_lahan,
            'rt'                => $request->rt,
            'rw'                => $request->rw,
        ]);

        return redirect()->route('persil.index')
            ->with('success', 'Data persil berhasil diperbarui');
    }

    public function destroy($id)
    {
        Persil::findOrFail($id)->delete();

        return redirect()->route('persil.index')
            ->with('success', 'Data persil berhasil dihapus');
    }
}
