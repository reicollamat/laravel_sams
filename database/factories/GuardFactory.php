<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Firearm>
 */
class GuardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => fake()->name(),
            'middle_name' => fake()->name(),
            'last_name' => fake()->name(),
            'birthdate' => fake()->date(),
            'sex' => 'M',
            'address' => fake()->address(),
            'nbi_clearance_id' => fake()->numerify('####-###-####'),
            'phone_number' => fake()->numerify('0##########'),
            'educational_attainment' => 1,
            'lesp_id' => fake()->numerify('###-####-####'),
            'sss' => fake()->numerify('###-####-####'),
            'agency_affiliation_date' => now(),
            'nbi_issued_date' => now(),
        ];
    }
}
