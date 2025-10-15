<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Uloga;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Super admin fixture
        $superAdminUser = User::firstOrCreate(
            ['email' => 'superadmin@mail.test'],
            [
                'name'     => 'Super Admin',
                'password' => Hash::make('superadmin123'),
            ]
        );

        $superAdminRole = Uloga::where('naziv', 'super_admin')->firstOrFail();
        $superAdminUser->uloge()->syncWithoutDetaching([$superAdminRole->id]);

        // Optionally, keep the old admin fixture for backward compatibility
        $korisnik = User::firstOrCreate(
            ['email' => 'admin@mail.test'],
            [
                'name'     => 'Administrator',
                'password' => Hash::make('lozinka123'),
            ]
        );
        $korisnik->uloge()->syncWithoutDetaching([$superAdminRole->id]);
    }
}
