<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    protected $table = 'warga';
    protected $primaryKey = 'warga_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
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
    ];

    // ➜ Tambahkan relasi ke Persil
    public function persil()
    {
        return $this->hasMany(Persil::class, 'pemilik_warga_id', 'warga_id');
    }
}
