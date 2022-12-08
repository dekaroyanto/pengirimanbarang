<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kendaraans')->insert([
            'platno' => 'E1302DB',
            'jeniskendaraan' => 'Mobil',
            'merk' => 'Toyota Agya',
        ]);
    }
}
