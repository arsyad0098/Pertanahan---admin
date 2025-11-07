<?php

namespace App\Http\Controllers;

use App\Models\JenisPenggunaan;
use Illuminate\Http\Request;

class JenisPenggunaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = JenisPenggunaan::all();
    return view('pages.persil.index', compact('data'));    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('pages.persil.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_penggunaan' => 'required|unique:jenis_penggunaan',
            'keterangan' => 'nullable'
        ]);

        JenisPenggunaan::create($request->all());
        return redirect()->route('jenis_penggunaan.index')
            ->with('success', 'Data berhasil ditambahkan!');
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
        $data = JenisPenggunaan::findOrFail($id);
    return view('pages.persil.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = JenisPenggunaan::findOrFail($id);
        $request->validate([
            'nama_penggunaan' => 'required|unique:jenis_penggunaan,nama_penggunaan,' . $id . ',jenis_id',
        ]);

        $data->update($request->all());
        return redirect()->route('jenis_penggunaan.index')
            ->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = JenisPenggunaan::findOrFail($id);
        $data->delete();
        return redirect()->route('jenis_penggunaan.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
