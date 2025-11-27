<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DataUser;
use Faker\Factory as Faker;

class CreateManyUsersSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 100; $i++) {

            DataUser::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'role' => $faker->randomElement(['admin', 'Operator', 'user','Supervisor','Manager']),
                'status' => $faker->randomElement(['active', 'inactive']),
                'tanggal_daftar' => $faker->date('Y-m-d', 'now'),
            ]);
        }
    }
}
