<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Persil;
use App\Models\Warga;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersilController extends Controller
{
    public function index(Request $request)
    {
        // Query dengan relasi warga, search, dan filter
        $data = Persil::with(['warga', 'media'])
                    ->search($request)
                    ->filter($request)
                    ->paginate(10)
                    ->withQueryString();

        // Dropdown filter
        $listRT = Persil::select('rt')->distinct()->orderBy('rt')->get();
        $listRW = Persil::select('rw')->distinct()->orderBy('rw')->get();

        return view('pages.persil.index', compact('data', 'listRT', 'listRW'));
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
            'files.*'           => 'nullable|file|mimes:jpeg,jpg,png,pdf,doc,docx,xls,xlsx|max:5120', // Max 5MB
        ]);

        $persil = Persil::create([
            'kode_persil'       => $request->kode_persil,
            'pemilik_warga_id'  => $request->pemilik_warga_id,
            'luas_m2'           => $request->luas_m2,
            'penggunaan'        => $request->penggunaan,
            'alamat_lahan'      => $request->alamat_lahan,
            'rt'                => $request->rt,
            'rw'                => $request->rw,
        ]);

        // Upload files jika ada
        if ($request->hasFile('files')) {
            $persil->uploadMedia($request->file('files'), $request->captions ?? []);
        }

        return redirect()->route('persil.show', $persil->persil_id)
            ->with('success', 'Data persil berhasil ditambahkan');
    }

    public function show($id)
    {
        $persil = Persil::with(['warga', 'media'])->findOrFail($id);
        return view('pages.persil.show', compact('persil'));
    }

    public function edit($id)
    {
        $persil = Persil::with('media')->findOrFail($id);
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
            'files.*'           => 'nullable|file|mimes:jpeg,jpg,png,pdf,doc,docx,xls,xlsx|max:5120',
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

        // Upload files baru jika ada
        if ($request->hasFile('files')) {
            $persil->uploadMedia($request->file('files'), $request->captions ?? []);
        }

        // PERBAIKAN: Redirect ke halaman show setelah update
        return redirect()->route('persil.show', $id)
            ->with('success', 'Data persil berhasil diperbarui');
    }

    public function destroy($id)
    {
        $persil = Persil::findOrFail($id);
        
        // File akan otomatis terhapus karena trait HasMediaUpload
        $persil->delete();

        return redirect()->route('persil.index')
            ->with('success', 'Data persil berhasil dihapus');
    }

    /**
     * Delete media file (AJAX)
     */
    public function deleteMedia($persilId, $mediaId)
    {
        $persil = Persil::findOrFail($persilId);
        
        if ($persil->deleteMedia($mediaId)) {
            return response()->json(['success' => true, 'message' => 'File berhasil dihapus']);
        }

        return response()->json(['success' => false, 'message' => 'File tidak ditemukan'], 404);
    }
}