<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ruangan;

class RuanganSeeder extends Seeder
{
    public function run(): void
    {
        Ruangan::create(['name' => 'Lab Komputer', 'is_active' => 1]);
        Ruangan::create(['name' => 'Gudang', 'is_active' => 1]);
        Ruangan::create(['name' => 'Workshop', 'is_active' => 0]);
    }
}