<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class WargaSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        $data = [];

        for ($i = 1; $i <= 100; $i++) {
            $data[] = [
                'no_ktp'        => $faker->unique()->nik(),
                'nama'          => $faker->name(),
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'agama'         => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
                'pekerjaan'     => $faker->jobTitle(),
                'telp'          => $faker->phoneNumber(),
                'email'         => $faker->unique()->safeEmail(),
                'alamat'        => $faker->streetAddress(),
                'rt'            => str_pad($faker->numberBetween(1, 5), 2, '0', STR_PAD_LEFT),
                'rw'            => str_pad($faker->numberBetween(1, 5), 2, '0', STR_PAD_LEFT),
                'created_at'    => now(),
                'updated_at'    => now(),
            ];
        }

        DB::table('warga')->insert($data);
    }
}
