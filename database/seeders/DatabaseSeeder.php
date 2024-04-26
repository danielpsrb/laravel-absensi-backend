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
        User::factory(3)->create();

        User::factory()->create([
            'name' => 'Daniel Admin',
            'email' => 'danspsrb@gmail.com',
            'password' => Hash::make('secretpass86'),
        ]);
        User::factory()->create([
            'name' => 'Dans Developer',
            'email' => 'admin@example.com',
            'password' => Hash::make('superadmin01'),
        ]);
    }
}
