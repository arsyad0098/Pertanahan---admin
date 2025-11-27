<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PersilSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        // Ambil semua warga_id hasil seeder sebelumnya
        $wargaIds = DB::table('warga')->pluck('warga_id')->toArray();

        $data = [];

        for ($i = 1; $i <= 50; $i++) {
            $data[] = [
                'kode_persil'       => 'PRS-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'pemilik_warga_id'  => $faker->randomElement($wargaIds),
                'luas_m2'           => $faker->numberBetween(50, 1000),
                'penggunaan'        => $faker->randomElement([
                    'Rumah Tinggal',
                    'Ruko / Toko',
                    'Kebun',
                    'Sawah',
                    'Gudang',
                    'Lahan Kosong',
                ]),
                'alamat_lahan'      => $faker->streetAddress(),
                'rt'                => str_pad($faker->numberBetween(1, 5), 2, '0', STR_PAD_LEFT),
                'rw'                => str_pad($faker->numberBetween(1, 5), 2, '0', STR_PAD_LEFT),
                'created_at'        => now(),
                'updated_at'        => now(),
            ];
        }

        DB::table('persil')->insert($data);
    }
}
