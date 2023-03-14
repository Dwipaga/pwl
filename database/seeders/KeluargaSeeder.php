<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keluarga')->insert([
            ['nama' => 'Lasidi',
             'jenis_kelamin' => 'laki-laki',
             'hubungan' => 'Bapak'],
             ['nama' => 'Wiwin Kurniasih',
             'jenis_kelamin' => 'perempuan',
             'hubungan' => 'ibu'],
             ['nama' => 'Windy',
             'jenis_kelamin' => 'perempuan',
             'hubungan' => 'anak'],
             ['nama' => 'Dwi Paga',
             'jenis_kelamin' => 'laki-laki',
             'hubungan' => 'anak']
            ]);
    }
}
