<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasMediaUpload;

class Persil extends Model
{
    use HasMediaUpload; // Tambahkan trait ini

    protected $table = 'persil';
    protected $primaryKey = 'persil_id';

    protected $fillable = [
        'kode_persil',
        'pemilik_warga_id',
        'luas_m2',
        'penggunaan',
        'alamat_lahan',
        'rt',
        'rw',
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'pemilik_warga_id', 'warga_id');
    }

    // Kolom yang dapat dicari
    protected $searchableColumns = [
        'kode_persil',
        'alamat_lahan',
        'rt',
        'rw',
        'penggunaan'
    ];

    /**
     * Scope untuk pencarian
     */
    public function scopeSearch($query, $request)
    {
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            
            $query->where(function($q) use ($searchTerm) {
                // Cari di kolom persil
                $q->where('kode_persil', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('alamat_lahan', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('rt', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('rw', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('penggunaan', 'LIKE', "%{$searchTerm}%")
                  
                  // Cari di relasi warga (nama pemilik)
                  ->orWhereHas('warga', function($q2) use ($searchTerm) {
                      $q2->where('nama', 'LIKE', "%{$searchTerm}%");
                  });
            });
        }

        return $query;
    }

    /**
     * Scope untuk filter RT & RW
     */
    public function scopeFilter($query, $request)
    {
        if ($request->filled('rt')) {
            $query->where('rt', $request->rt);
        }

        if ($request->filled('rw')) {
            $query->where('rw', $request->rw);
        }

        return $query;
    }
}