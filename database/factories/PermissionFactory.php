<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permissions>
 */
class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id' => User::all()->random()->id, // Get random user_id from User model (table users
            'date_permission' => $this->faker->date(),
            'reason' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
