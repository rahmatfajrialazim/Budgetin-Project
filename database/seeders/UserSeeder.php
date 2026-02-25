<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Rahmat Fajrial Azim', 
            'email' => 'admin@budgetin.com',
            'password' => Hash::make('password_budgetin'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Bendahara 1',
            'email' => 'bendahara1@budgetin.com',
            'password' => Hash::make('password_budgetin'),
            'role' => 'bendahara',
        ]);
    }
}