<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {

        User::create([
            'name'=>'Administrator',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('12345'),
            'role'=>'admin'
        ]);

        User::create([
            'name'=>'Farhan',
            'email'=>'farhan@gmail.com',
            'password'=>Hash::make('12345'),
            'role'=>'anggota'
        ]);

    }
}