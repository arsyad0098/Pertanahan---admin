<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumentasiController extends Controller
{
    public function index()
    {
        $data = Dokumentasi::latest()->paginate(12);
        return view('pages.dokumentasi.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'tanggal_foto' => 'nullable|date',
            'lokasi' => 'nullable|string|max:255'
        ], [
            'judul.required' => 'Judul dokumentasi wajib diisi',
            'foto.required' => 'Foto wajib diupload',
            'foto.image' => 'File harus berupa gambar',
            'foto.mimes' => 'Format gambar harus jpeg, png, atau jpg',
            'foto.max' => 'Ukuran gambar maksimal 2MB'
        ]);

        try {
            $fotoName = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(
                public_path('uploads/dokumentasi'),
                $fotoName
            );


            Dokumentasi::create([
                'judul' => $request->judul,
                'keterangan' => $request->keterangan,
                'foto' => $fotoName,
                'tanggal_foto' => $request->tanggal_foto,
                'lokasi' => $request->lokasi
            ]);

            return redirect()->route('dokumentasi.index')
                ->with('success', 'Dokumentasi berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menambahkan dokumentasi: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $dokumentasi = Dokumentasi::findOrFail($id);

            // Hapus file foto
            Storage::delete('public/dokumentasi/' . $dokumentasi->foto);

            // Hapus data dari database
            $dokumentasi->delete();

            return redirect()->route('dokumentasi.index')
                ->with('success', 'Dokumentasi berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus dokumentasi: ' . $e->getMessage());
        }
    }
}
