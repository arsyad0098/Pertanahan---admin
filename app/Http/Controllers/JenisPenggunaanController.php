<?php

namespace App\Http\Controllers;

use App\Models\JenisPenggunaan;
use Illuminate\Http\Request;

class JenisPenggunaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    // Kolom yang boleh difilter dropdown
    $filterableColumns = ['nama_penggunaan'];

    // Kolom yang boleh dicari via search
    $searchableColumns = ['nama_penggunaan', 'keterangan']; // bebas kamu tambah

    $data = JenisPenggunaan::filter($request, $filterableColumns)
                ->search($request, $searchableColumns)
                ->paginate(10)
                ->withQueryString();

    // Semua data untuk dropdown
    $data_all = JenisPenggunaan::all();

    return view('pages.jenisPenggunaan.index', compact('data', 'data_all'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('pages.jenisPenggunaan.create');
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
    return view('pages.jenisPenggunaan.edit', compact('data'));
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
