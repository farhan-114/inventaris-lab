<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rak;

class RakSeeder extends Seeder
{
    public function run(): void
    {
        Rak::create([
            'nama'      => 'Rak A',
            'is_active' => 1,
        ]);

        Rak::create([
            'nama'      => 'Rak B',
            'is_active' => 1,
        ]);

        Rak::create([
            'nama'      => 'Rak C',
            'is_active' => 1,
        ]);
    }
}