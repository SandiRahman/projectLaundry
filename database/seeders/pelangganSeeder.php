<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class pelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 50; $i++) { // Perbaiki loop agar tidak diakhiri dengan titik koma (;)
            DB::table('pelanggans')->insert([
                'nama' => $faker->name,
                'alamat' => $faker->address,
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'tlp' => $faker->phoneNumber,
            ]);
        }
    }
}
