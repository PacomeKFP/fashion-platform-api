<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Styliste>
 */
class StylisteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'biographie' => fake()->sentence(),
            'specialite' => fake()->word(),
            'disponibilite' => fake()->word(),
            'note_moyenne' => fake()->numberBetween(1, 5),
        ];
    }
}
