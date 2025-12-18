<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserAdmin extends Authenticatable  // ← UBAH dari User jadi UserAdmin
{
    use Notifiable;

    /**
     * Nama tabel di database
     */
    protected $table = 'user_admin';

    /**
     * Kolom yang bisa diisi mass assignment
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        'role',
    ];

    /**
     * Kolom yang disembunyikan saat serialization
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Cast tipe data
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}