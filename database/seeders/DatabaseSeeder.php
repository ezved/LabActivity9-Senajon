<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // my login account
        User::create([
            'name' => 'Lourrence Ed',
            'email' => 'nurse.senajon@bakuna.test',
            'password' => Hash::make('bakuna2026'),
        ]);

        // then add the vaccinations
        $this->call([
            VaccinationSeeder::class,
        ]);
    }
}
