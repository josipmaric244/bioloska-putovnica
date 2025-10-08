<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Uloga;

class UlogeSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['super_admin', 'admin', 'korisnik'] as $naziv) {
            Uloga::firstOrCreate(['naziv' => $naziv]);
        }
    }
}
