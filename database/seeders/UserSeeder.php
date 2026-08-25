<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Data Admin
        User::create([
            'name' => 'Admin Kos',
            'email' => 'admin@kos.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Data Penghuni
        User::create([
            'name' => 'Penghuni Satu',
            'email' => 'penghuni@kos.com',
            'password' => Hash::make('password123'),
            'role' => 'penghuni',
        ]);

        // Data Penghuni Kedua (opsional)
        User::create([
            'name' => 'Penghuni Dua',
            'email' => 'penghuni2@kos.com',
            'password' => Hash::make('password123'),
            'role' => 'penghuni',
        ]);
    }
}