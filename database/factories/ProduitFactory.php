<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $stiliste_id = \App\Models\Styliste::all()->pluck('id')->toArray();
        return [
            'styliste_id' => fake()->randomElement($stiliste_id),
            'nom' => fake()->word(),
            'description' => fake()->sentence(),
            'prix' => fake()->randomFloat(),
            'categories' => fake()->word(),
            'delai_confection' => fake()->date()
        ];
    }
}
