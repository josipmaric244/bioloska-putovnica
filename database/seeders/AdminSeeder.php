<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Uloga;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $korisnik = User::firstOrCreate(
            ['email' => 'admin@mail.test'],
            [
                'name'     => 'Administrator',
                'password' => Hash::make('lozinka123'),
            ]
        );


        $superAdmin = Uloga::where('naziv', 'super_admin')->firstOrFail();
        $korisnik->uloge()->syncWithoutDetaching([$superAdmin->id]);
    }
}
