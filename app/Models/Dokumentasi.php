<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    use HasFactory;

    protected $table = 'dokumentasi';
    protected $primaryKey = 'dokumentasi_id';
    
    protected $fillable = [
        'judul',
        'keterangan',
        'foto',
        'tanggal_foto',
        'lokasi'
    ];

    protected $casts = [
        'tanggal_foto' => 'date',
    ];
}