<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
<<<<<<< HEAD
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
=======
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
