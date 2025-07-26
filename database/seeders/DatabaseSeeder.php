<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        $this->call([
            RakSeeder::class,
            KategoriSeeder::class,
            RuanganSeeder::class,
            UserAdminSeeder::class,
            BarangSeeder::class
        ]);
    }
}