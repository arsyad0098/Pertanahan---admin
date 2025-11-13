<?php

namespace App\Http\Controllers;

use App\Models\JenisPenggunaan;
use App\Models\Warga;
use App\Models\DataUser; // ✅ tambahkan model DataUser
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display dashboard with statistics
     */
    public function index()
    {
        // Hitung total data penggunaan tanah
        $totalData = JenisPenggunaan::count();

        // Hitung total warga
        $totalWarga = Warga::count();

        // Hitung jumlah RT yang terdaftar
        $totalRT = Warga::distinct('rt')->count('rt');

        // Hitung jumlah RW yang terdaftar
        $totalRW = Warga::distinct('rw')->count('rw');

        // Hitung user aktif berdasarkan tabel data_user
        $statusAktif = DataUser::where('status', 'active')->count(); // ✅ ambil jumlah user aktif

        // Data untuk chart (opsional)
        $dataPerRT = Warga::selectRaw('rt, COUNT(*) as total')
            ->groupBy('rt')
            ->orderBy('rt')
            ->get();

        $dataPerRW = Warga::selectRaw('rw, COUNT(*) as total')
            ->groupBy('rw')
            ->orderBy('rw')
            ->get();

        // Kirim data ke view
        return view('dashboard', compact(
            'totalData',
            'statusAktif',
            'totalWarga',
            'totalRT',
            'totalRW',
            'dataPerRT',
            'dataPerRW'
        ));
    }
}
