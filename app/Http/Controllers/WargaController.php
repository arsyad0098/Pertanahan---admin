<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index()
    {
        $data = Warga::all();
        return view('pages.warga.index', compact('data'));
    }

    public function create()
    {
        return view('pages.warga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_ktp'       => 'required|string|max:20|unique:warga,no_ktp',
            'nama'         => 'required|string|max:255',
            'jenis_kelamin'=> 'nullable|string|max:50',
            'agama'        => 'nullable|string|max:50',
            'pekerjaan'    => 'nullable|string|max:100',
            'telp'         => 'nullable|string|max:20',
            'email'        => 'nullable|email|max:255',
            'alamat'       => 'nullable|string',
            'rt'           => 'nullable|string|max:3',
            'rw'           => 'nullable|string|max:3',
        ]);

        Warga::create($request->only([
            'no_ktp',
            'nama',
            'jenis_kelamin',
            'agama',
            'pekerjaan',
            'telp',
            'email',
            'alamat',
            'rt',
            'rw',
        ]));

        return redirect()->route('warga.index')
                         ->with('success', 'Data warga berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = Warga::findOrFail($id);
        return view('pages.warga.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Warga::findOrFail($id);

        $request->validate([
            'no_ktp'       => 'required|string|max:20|unique:warga,no_ktp,' . $id . ',warga_id',
            'nama'         => 'required|string|max:255',
            'jenis_kelamin'=> 'nullable|string|max:50',
            'agama'        => 'nullable|string|max:50',
            'pekerjaan'    => 'nullable|string|max:100',
            'telp'         => 'nullable|string|max:20',
            'email'        => 'nullable|email|max:255',
            'alamat'       => 'nullable|string',
            'rt'           => 'nullable|string|max:3',
            'rw'           => 'nullable|string|max:3',
        ]);

        $data->update($request->only([
            'no_ktp',
            'nama',
            'jenis_kelamin',
            'agama',
            'pekerjaan',
            'telp',
            'email',
            'alamat',
            'rt',
            'rw',
        ]));

        return redirect()->route('warga.index')
                         ->with('success', 'Data warga berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $data = Warga::findOrFail($id);
        $data->delete();

        return redirect()->route('warga.index')
                         ->with('success', 'Data warga berhasil dihapus!');
    }
}
