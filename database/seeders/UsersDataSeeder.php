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
                'faculty_id' => 2,
                'department_id' => 20,
                'role' => 'admin',
            ],
            [
                'name' => 'Aril Alex',
                'email' => 'arilalex@example.com',
                'password' => Hash::make('arilalex12'),
                'nim' => '210211060125',
                'faculty_id' => 2,
                'department_id' => 20,
                'role' => 'user',
            ],
            [
                'name' => 'Daniel Pasaribu',
                'email' => 'danielpsrb@example.com',
                'password' => Hash::make('danz1234'),
                'nim' => '210211060127',
                'faculty_id' => 2,
                'department_id' => 20,
                'role' => 'user',
            ],
            [
                'name' => 'Dwi Kuncoro Sakti',
                'email' => 'dwi@example.com',
                'password' => Hash::make('kuncoro123'),
                'nim' => '210211060162',
                'faculty_id' => 2,
                'department_id' => 20,
                'role' => 'user',
            ],
            [
                'name' => 'Muhammad Yasser',
                'email' => 'yasser@example.com',
                'password' => Hash::make('yasser123'),
                'nim' => '210211060140',
                'faculty_id' => 2,
                'department_id' => 20,
                'role' => 'user',
            ],
            [
                'name' => 'Resware Argya Munda',
                'email' => 'reswara@example.com',
                'nim' => '210211060106',
                'password' => Hash::make('reswara123'),
                'nim' => '210211060100',
                'faculty_id' => 2,
                'department_id' => 20,
                'role' => 'user',
            ],
            [
                'name' => 'Vincent Julio Angdrianto Sompie',
                'email' => 'vincent@example.com',
                'password' => Hash::make('vincent123'),
                'nim' => '210211060120',
                'faculty_id' => 2,
                'department_id' => 20,
                'role' => 'user',
            ],
            [
                'name' => 'Alfrets Ebenhaezar Maleke',
                'email' => 'alfrets@example.com',
                'password' => Hash::make('alfrets123'),
                'nim' => '210211060263',
                'faculty_id' => 2,
                'department_id' => 20,
                'role' => 'user',
            ],
            [
                'name' => 'Descarter Miroslav Klose Baginda',
                'email' => 'descarter@example.com',
                'password' => Hash::make('descarter123'),
                'nim' => '210211060170',
                'faculty_id' => 2,
                'department_id' => 20,
                'role' => 'user',
            ]
        ];

        foreach($userData as $key => $val) {
            User::create($val);
        }
    }
}
