<?php

namespace App\Http\Controllers;

use App\Models\JenisPenggunaan;
use App\Models\Warga;
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

        // Hitung status aktif (semua data dianggap aktif)
        $statusAktif = JenisPenggunaan::count();

        // Hitung total warga
        $totalWarga = Warga::count();

        // Hitung jumlah RT yang terdaftar
        $totalRT = Warga::distinct('rt')->count('rt');

        // Hitung jumlah RW yang terdaftar
        $totalRW = Warga::distinct('rw')->count('rw');

        // Data untuk chart atau keperluan lain (opsional)
        $dataPerRT = Warga::selectRaw('rt, COUNT(*) as total')
            ->groupBy('rt')
            ->orderBy('rt')
            ->get();

        $dataPerRW = Warga::selectRaw('rw, COUNT(*) as total')
            ->groupBy('rw')
            ->orderBy('rw')
            ->get();

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
