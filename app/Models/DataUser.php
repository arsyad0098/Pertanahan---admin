<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUser extends Model
{
    use HasFactory;

    protected $table = 'data_user';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'name',
        'email',
        'role',
        'status',
        'tanggal_daftar'
    ];

    protected $casts = [
        'tanggal_daftar' => 'date',
    ];

    // ⬇ Tambahkan fitur filter
    public function scopeFilter($query, $request, $filterable)
    {
        foreach ($filterable as $field) {
            if ($request->filled($field)) {

                // Filter khusus tanggal
                if ($field === 'tanggal_daftar') {
                    $query->whereDate($field, $request->$field);
                } else {
                    $query->where($field, 'LIKE', '%' . $request->$field . '%');
                }
            }
        }
        return $query;
    }
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
