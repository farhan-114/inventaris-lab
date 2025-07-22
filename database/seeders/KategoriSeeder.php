<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        Kategori::create(['nama' => 'Elektronik']);
        Kategori::create(['nama' => 'Alat Tulis']);
        Kategori::create(['nama' => 'Perangkat Keras']);
    }
}