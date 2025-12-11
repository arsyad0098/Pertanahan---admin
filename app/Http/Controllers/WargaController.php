<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index(Request $request)
    {
        // Filter dropdown
        $filterable = ['jenis_kelamin', 'agama', 'pekerjaan', 'rt', 'rw'];

        // Kolom yang bisa dicari via search bebas
        $searchableColumns = ['nama', 'no_ktp', 'email', 'alamat', 'pekerjaan'];

        // Query utama
        $data = Warga::filter($request, $filterable)
                     ->search($request, $searchableColumns)
                     ->paginate(10)
                     ->withQueryString();

        // Data dropdown
        $jenis_kelamin_all = Warga::select('jenis_kelamin')->distinct()->get();
        $agama_all         = Warga::select('agama')->distinct()->get();
        $pekerjaan_all     = Warga::select('pekerjaan')->distinct()->get();
        $rt_all            = Warga::select('rt')->distinct()->get();
        $rw_all            = Warga::select('rw')->distinct()->get();

        return view('pages.warga.index', compact(
            'data',
            'jenis_kelamin_all',
            'agama_all',
            'pekerjaan_all',
            'rt_all',
            'rw_all'
        ));
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
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // ✅ VALIDASI FOTO
        ]);

        $data = $request->only([
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
        ]);

        // ✅ UPLOAD FOTO PROFIL
        if ($request->hasFile('profile_picture')) {
            $filename = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('uploads/profile'), $filename);
            $data['profile_picture'] = $filename;
        }

        Warga::create($data);

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
        $warga = Warga::findOrFail($id);

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
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // ✅ VALIDASI FOTO
        ]);

        $data = $request->only([
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
        ]);

        // ✅ UPLOAD FOTO BARU (jika ada)
        if ($request->hasFile('profile_picture')) {
            // Hapus foto lama
            if ($warga->profile_picture && file_exists(public_path('uploads/profile/' . $warga->profile_picture))) {
                unlink(public_path('uploads/profile/' . $warga->profile_picture));
            }

            // Upload foto baru
            $filename = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('uploads/profile'), $filename);
            $data['profile_picture'] = $filename;
        }

        $warga->update($data);

        return redirect()->route('warga.index')
                         ->with('success', 'Data warga berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $warga = Warga::findOrFail($id);
        
        // ✅ HAPUS FOTO JIKA ADA
        if ($warga->profile_picture && file_exists(public_path('uploads/profile/' . $warga->profile_picture))) {
            unlink(public_path('uploads/profile/' . $warga->profile_picture));
        }
        
        $warga->delete();

        return redirect()->route('warga.index')
                         ->with('success', 'Data warga berhasil dihapus!');
    }
}