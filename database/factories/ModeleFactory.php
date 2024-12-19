<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Modele>
 */
class ModeleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categorie_id = \App\Models\Categorie::all()->pluck('id')->toArray();
        $styliste_id = \App\Models\Styliste::all()->pluck('id')->toArray();
        return [
            'categorie_id' => fake()->randomElement($categorie_id),
            'styliste_id' => fake()->randomElement($styliste_id),
            'title' => fake()->word(),
            'description' => fake()->sentence(),
            'intervalPrix' => fake()->word(),
        ];
    }
}
