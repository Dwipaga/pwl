<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtikelModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artikel_models')->insert([
            [
            'judul' => 'Laravel: Definisi, Fitur, Keunggulan, Kekurangan, dan 9 Tips Belajar Laravel',
            'penulis' =>'Alvina Vivian',
            'tanggal_publish' => '2022-06-15'],
            ['judul' => 'Laravel Framework: Pengertian, Keunggulan & Tips untuk Pemula',
            'penulis' =>'Yasin K',
            'tanggal_publish' => '2019-01-28'],
            ['judul' => 'Apa itu Laravel? Pengertian, Fitur dan Kelebihannya',
            'penulis' =>' M Ali Maksum',
            'tanggal_publish' => '2022-06-10']]);
    }
}
