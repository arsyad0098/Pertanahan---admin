<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class UserAdmin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user_admin';

    protected $fillable = [
        'nama',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
