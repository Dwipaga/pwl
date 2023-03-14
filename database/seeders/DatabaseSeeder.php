<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(ArtikelModelSeeder::class);
        // $this->call(HobiSeeder::class);
        $this->call(MatakuliahSeeder::class);

    }
}
