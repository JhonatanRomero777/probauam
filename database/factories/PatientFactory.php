<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create(),
            'entity_id' => 1,
            'names' => $this->faker->name(),
            'last_names' => $this->faker->lastName(),
            'document_type' => $this->faker->randomElement([17, 18, 19, 20]),
            'document' => $this->faker->unique()->numberBetween($min = 1000000000, $max = 9999999999),
            'birthday' => $this->faker->date(),
            'sex' => $this->faker->randomElement([1, 2, 3]),
            'height' => 180,
            'weight' => 60,
            'size' => 50,
            'phone' => $this->faker->phoneNumber(),
            'direction' => $this->faker->sentence(2),
            'civil_status' => $this->faker->randomElement([4, 5, 6, 7, 8]),
            'education_level' => $this->faker->randomElement([9, 10, 11, 12, 13, 14, 15, 16]),
            'socioeconomic_stratum' => $this->faker->randomElement([26, 27, 28, 29, 30, 31]),
            'social_security_scheme' => $this->faker->randomElement([32, 33, 34, 35, 36, 37, 38]),
            'created_at' => $this->faker->dateTimeBetween($startDate = '-5 days', $endDate = '+5 days')
        ];
    }
}