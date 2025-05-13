<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InstructorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'instructor_id' => 'INST-' . $this->faker->unique()->numberBetween(1000, 9999),
            'department' => $this->faker->randomElement([
                'Computer Science',
                'Mathematics', 
                'Physics',
                'Engineering',
                'Business Administration',
                'Education'
            ]),
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->address(),
            'contact_number' => $this->faker->phoneNumber(),
            'gender' => $this->faker->randomElement(['Male', 'Female', 'Other']),
            'birthdate' => $this->faker->date(), // Simple random date
            // OR for more control:
            // 'birthdate' => $this->faker->dateTimeBetween('-50 years', '-25 years')->format('Y-m-d'),
        ];
    }
}