<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Bank;
use App\Models\User;
use App\Models\Tenor;
use App\Models\UserDetail;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create();
        UserDetail::factory(1)->create();

        Tenor::create([
            'tenor' => 6,
            'bunga' => 11,
        ]);

        Tenor::create([
            'tenor' => 12,
            'bunga' => 10,
        ]);

        Tenor::create([
            'tenor' => 24,
            'bunga' => 9,
        ]);

        Bank::create([
            'nama_bank' => 'Mandiri',
        ]);

        Bank::create([
            'nama_bank' => 'BRI',
        ]);

        Bank::create([
            'nama_bank' => 'BCA',
        ]);

        Bank::create([
            'nama_bank' => 'BNI',
        ]);

        Bank::create([
            'nama_bank' => 'BTN',
        ]);

        Bank::create([
            'nama_bank' => 'CIMB Niaga',
        ]);

        Bank::create([
            'nama_bank' => 'Danamon',
        ]);
    }
}
