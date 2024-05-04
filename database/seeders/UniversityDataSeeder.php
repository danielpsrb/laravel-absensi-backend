<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\University;

class UniversityDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a new university
        University::create([
            'name' => 'University of Zimbabwe',
            'email' => 'zimbabwe@example.com',
            'address' => 'P.O. Box MP 167, Mount Pleasant, Harare, Zimbabwe',
            'phone_number' => '263 242 303211',
            'latitude' => -17.825165,
            'longitude' => 31.033510,
            'radius_km' => 1,
            'time_in' => '08:00',
            'time_out' => '16:00',
        ]);
    }
}
