<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matkul = [
            [
                'nama_matkul' => 'pemrograman berbasis objek',
                'sks' => 3,
                'jam' => 6,
                'semester' => 4,
            ],
            [
                'nama_matkul' => 'pemrograman Web Lanjut',
                'sks' => 3,
                'jam' => 6,
                'semester' => 4,
            ],
            [
                'nama_matkul' => 'Basis Data Lanjut',
                'sks' => 3,
                'jam' => 4,
                'semester' => 4,
            ],
            [
                'nama_matkul' => 'Praktikum Basis Data Lanjut',
                'sks' => 3,
                'jam' => 6,
                'semester' => 4,
            ],
        ];
        DB::table('matakuliah')->insert($matkul);
    }
}