<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Daniel Admin',
                'email' => 'dans@example.com',
                'password' => Hash::make('superadmin21'),
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
                'email' => 'danielpsrb@example.com',
                'password' => Hash::make('danz1234'),
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
            ],
            [
                'name' => 'Resware Argya Munda',
                'email' => 'reswara@example.com',
                'password' => Hash::make('reswara123'),
                'role' => 'user',
            ],
            [
                'name' => 'Vincent Julio Angdrianto Sompie',
                'email' => 'vincent@example.com',
                'password' => Hash::make('vincent123'),
                'role' => 'user',
            ],
            [
                'name' => 'Alfrets Ebenhaezar Maleke',
                'email' => 'alfrets@example.com',
                'password' => Hash::make('alfrets123'),
                'role' => 'user',
            ],
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('johndoe123'),
                'role' => 'user',
            ]
        ];

        foreach($userData as $key => $val) {
            User::create($val);
        }
    }
}
