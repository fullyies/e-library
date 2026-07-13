<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@elibrary.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        // Anggota 1
        User::create([
            'name' => 'Farhan',
            'username' => 'farhan',
            'email' => 'farhan@gmail.com',
            'password' => Hash::make('farhan123'),
            'role' => 'anggota',
        ]);

        // Anggota 2
        User::create([
            'name' => 'Budi Santoso',
            'username' => 'budi',
            'email' => 'budi@gmail.com',
            'password' => Hash::make('budi123'),
            'role' => 'anggota',
        ]);
    }
}