<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'name' => 'Aril Alex',
            'nim' => '210211060125',
            'faculty_id' => 2,
            'department_id' => 20,
            'user_id' => 2,
        ]);

        Student::create([
            'name' => 'Daniel Pasaribu',
            'nim' => '210211060127',
            'faculty_id' => 2,
            'department_id' => 20,
            'user_id' => 3,
        ]);

        Student::create([
            'name' => 'Dwi Kuncoro Sakti',
            'nim' => '210211060162',
            'faculty_id' => 2,
            'department_id' => 20,
            'user_id' => 4,
        ]);

        Student::create([
            'name' => 'Muhammad Yasser Rahmattullah',
            'nim' => '210211060140',
            'faculty_id' => 2,
            'department_id' => 20,
            'user_id' => 5,
        ]);

        Student::create([
            'name' => 'Resware Argya Munda',
            'nim' => '210211060106',
            'faculty_id' => 2,
            'department_id' => 20,
            'user_id' => 6,
        ]);

        Student::create([
            'name' => 'Vincent Julio Sompie',
            'nim' => '210211060120',
            'faculty_id' => 2,
            'department_id' => 20,
            'user_id' => 7,
        ]);

        Student::create([
            'name' => 'Alfrets Ebenhaezer Maleke',
            'nim' => '210211060263',
            'faculty_id' => 2,
            'department_id' => 20,
            'user_id' => 8,
        ]);

        Student::create([
            'name' => 'Descarter Miroslav Klose',
            'nim' => '210211060170',
            'faculty_id' => 2,
            'department_id' => 20,
            'user_id' => 9,
        ]);

        Student::create([
            'name' => 'Meylani Moningkey',
            'nim' => '210211060006',
            'faculty_id' => 2,
            'department_id' => 20,
            'user_id' => 10,
        ]);

        Student::create([
            'name' => 'Samuel Mario Maliangkay',
            'nim' => '210211060084',
            'faculty_id' => 2,
            'department_id' => 20,
            'user_id' => 11,
        ]);

        Student::create([
            'name' => 'Don Bosco Bororing',
            'nim' => '210211060112',
            'faculty_id' => 2,
            'department_id' => 20,
            'user_id' => 13,
        ]);

        Student::create([
            'name' => 'Bella Aprilia Sampe',
            'nim' => '210211060073',
            'faculty_id' => 2,
            'department_id' => 20,
            'user_id' => 15,
        ]);
    }
}
