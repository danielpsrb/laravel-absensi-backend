<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $jumlahSeeder = [
            1 => 14,
            2 => 7,
            3 => 8,
            4 => 4,
            5 => 8,
            6 => 8,
            7 => 2,
            8 => 9,
            9 => 5,
            10 => 6,
            11 => 1,
            12 => 14,
        ];

        foreach ($jumlahSeeder as $facultyId => $jumlah) {
            Department::factory($jumlah)->create([
                'faculty_id' => $facultyId,
            ]);
        }
    }
}
