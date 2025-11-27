<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisPenggunaan extends Model
{
    protected $table = 'jenis_penggunaan';
    protected $primaryKey = 'jenis_id';
    protected $fillable = ['nama_penggunaan', 'keterangan'];

    /**
     * Scope Filter (Filter berdasarkan dropdown)
     */
    public function scopeFilter($query, $request, $filterable)
    {
        foreach ($filterable as $field) {
            if ($request->filled($field)) {
                $query->where($field, 'LIKE', '%' . $request->$field . '%');
            }
        }

        return $query;
    }

    /**
     * Scope Search (Search bebas input text)
     */
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
