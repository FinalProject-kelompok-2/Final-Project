<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tenor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Tenor::create([
            'tenor' => 6,
            'bunga' => 5,
        ]);

        Tenor::create([
            'tenor' => 12,
            'bunga' => 4,
        ]);

        Tenor::create([
            'tenor' => 24,
            'bunga' => 3,
        ]);
    }
}
