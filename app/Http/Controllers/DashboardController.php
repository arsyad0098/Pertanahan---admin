<?php

namespace App\Http\Controllers;

use App\Models\JenisPenggunaan;
use App\Models\Warga;
use App\Models\DataUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display dashboard with statistics
     */
    public function index()
    {
        // Cek apakah user sudah login (backup check, walaupun sudah ada middleware)
        if (!Auth::check()) {
            return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Hitung total data penggunaan tanah
        $totalData = JenisPenggunaan::count();

        // Hitung total warga
        $totalWarga = Warga::count();

        // Hitung jumlah RT yang terdaftar
        $totalRT = Warga::distinct('rt')->count('rt');

        // Hitung jumlah RW yang terdaftar
        $totalRW = Warga::distinct('rw')->count('rw');

        // Hitung user aktif berdasarkan tabel data_user
        $statusAktif = DataUser::where('status', 'active')->count();

        // Data untuk chart (opsional)
        $dataPerRT = Warga::selectRaw('rt, COUNT(*) as total')
            ->groupBy('rt')
            ->orderBy('rt')
            ->get();

        $dataPerRW = Warga::selectRaw('rw, COUNT(*) as total')
            ->groupBy('rw')
            ->orderBy('rw')
            ->get();

        // Ambil data user yang sedang login
        $user = Auth::user();

        // Kirim data ke view
        return view('dashboard', compact(
            'totalData',
            'statusAktif',
            'totalWarga',
            'totalRT',
            'totalRW',
            'dataPerRT',
            'dataPerRW',
            'user'
        ));
    }
}