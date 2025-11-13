<?php
// app/Models/DataUser.php

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
}