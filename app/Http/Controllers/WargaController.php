<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index()
    {
        $data = Warga::all();
        return view('admin.warga.index', compact('data'));
    }

    public function create()
    {
        return view('admin.warga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'   => 'required|string|max:255',
            'nik'    => 'required|string|max:20|unique:warga,nik',
            'alamat' => 'required|string',
            'rt'     => 'required|string|max:3',
            'rw'     => 'required|string|max:3',
        ]);

        Warga::create($request->all());

        return redirect()->route('warga.index')
                         ->with('success', 'Data warga berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = Warga::findOrFail($id);
        return view('admin.warga.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Warga::findOrFail($id);

        $request->validate([
            'nama'   => 'required|string|max:255',
            'nik'    => 'required|string|max:20|unique:warga,nik,' . $id,
            'alamat' => 'required|string',
            'rt'     => 'required|string|max:3',
            'rw'     => 'required|string|max:3',
        ]);

        $data->update($request->all());

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
