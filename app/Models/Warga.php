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
        'profile_picture', // ✅ TAMBAHKAN INI
    ];

    public function persil()
    {
        return $this->hasMany(Persil::class, 'pemilik_warga_id', 'warga_id');
    }

    // FILTER DROPDOWN
    public function scopeFilter($query, $request, $filterable)
    {
        foreach ($filterable as $field) {
            if ($request->filled($field)) {
                $query->where($field, 'LIKE', '%' . $request->$field . '%');
            }
        }
        return $query;
    }

    // 🔍 SEARCH BEBAS (multi kolom)
    public function scopeSearch($query, $request, array $columns)
    {
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request, $columns) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'LIKE', '%' . $request->search . '%');
                }
            });
        }
        return $query;
    }
}