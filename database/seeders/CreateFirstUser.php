<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DataUser;
use Carbon\Carbon;

class CreateFirstUser extends Seeder
{
    public function run()
    {
        DataUser::create([
            'name' => 'Admin Pertama',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'status' => 'active',
            'tanggal_daftar' => Carbon::now()->toDateString(),
        ]);
    }
}
