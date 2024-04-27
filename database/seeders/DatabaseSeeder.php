<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Daniel Admin',
                'email' => 'dansp@example.com',
                'password' => Hash::make('superadmin01'),
                'role' => 'admin',
            ],
            [
                'name' => 'Aril Alex',
                'email' => 'arilalex@example.com',
                'password' => Hash::make('arilalex12'),
                'role' => 'user',
            ],
            [
                'name' => 'Daniel Pasaribu',
                'email' => 'danielp@example.com',
                'password' => Hash::make('1234abcd'),
                'role' => 'user',
            ],
            [
                'name' => 'Dwi Kuncoro Sakti',
                'email' => 'dwi@example.com',
                'password' => Hash::make('kuncoro123'),
                'role' => 'user',
            ],
            [
                'name' => 'Muhammad Yasser',
                'email' => 'yasser@example.com',
                'password' => Hash::make('yasser123'),
                'role' => 'user',
            ]
        ];

        foreach($userData as $key => $val) {
            User::create($val);
        }
    }
}
