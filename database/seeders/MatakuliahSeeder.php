<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matakuliahs')->insert([
            ['nama_matkul' => 'Kewarganegaraan',
             'nama_dosen' => 'Widaningsih, S.H., M.H.'],
            ['nama_matkul' => 'Praktikum Jaringan Komputer',
            'nama_dosen' => 'Kadek Suarjuna Batubulan, S.Kom., M.T.'],
            ['nama_matkul' => 'Business Intelligence',
            'nama_dosen' => 'Endah Septa Sintiya, S.Pd., M.Kom.']
        ]);
    }
}
