<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KurirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kurirs')->insert([
            'nik' => '321124534632',
            'nama' => 'Deka Royanto',
            'notelepon' => '081805032002',
            'alamat' => 'Cirebon'
        ]);
    }
}
