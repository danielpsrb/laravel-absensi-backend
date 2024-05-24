<?php

namespace Database\Factories;

use App\Models\Faculty;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
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
            'name' => $this->faker->name,
            'description' => $this->faker->sentence,
            'faculty_id' => function() {
                return Faculty::inRandomOrder()->first()->id;
            },
            'coordinator' => $this->faker->name,
            'hod' => $this->faker->name,
        ];
    }
}
