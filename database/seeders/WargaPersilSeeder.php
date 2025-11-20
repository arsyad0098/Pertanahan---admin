<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Warga;
use App\Models\Persil;

class WargaPersilSeeder extends Seeder
{
    public function run(): void
    {
        $warga = Warga::create([
            'no_ktp'        => '3512345678900001',
            'nama'          => 'Budi Santoso',
            'jenis_kelamin' => 'Laki-laki',
            'agama'         => 'Islam',
            'pekerjaan'     => 'Petani',
            'telp'          => '081234567890',
            'email'         => 'budi@example.com',
            'alamat'        => 'Jl. Kebun Raya No. 12',
            'rt'            => '01',
            'rw'            => '05',
        ]);

        Persil::create([
            'kode_persil'      => 'PRS-001',
            'pemilik_warga_id' => $warga->warga_id,  // relasi
            'luas_m2'          => 250,
            'penggunaan'       => 'Pemukiman',
            'alamat_lahan'     => 'Jl. Kebun Raya No. 12',
            'rt'               => '01',
            'rw'               => '05',
        ]);

        Persil::create([
            'kode_persil'      => 'PRS-002',
            'pemilik_warga_id' => $warga->warga_id,
            'luas_m2'          => 180,
            'penggunaan'       => 'Kebun',
            'alamat_lahan'     => 'Belakang rumah',
            'rt'               => '01',
            'rw'               => '05',
        ]);
    }
}
