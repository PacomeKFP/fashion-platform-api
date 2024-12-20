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
        $mensuration_id = \App\Models\Mensuration::all()->pluck('id')->toArray();
        $categorie_id = \App\Models\Categorie::all()->pluck('id')->toArray();
        $modele_id = \App\Models\Modele::all()->pluck('id')->toArray();
        return [
            'styliste_id' => fake()->randomElement($stiliste_id),
            'mensuration_id' => fake()->randomElement($mensuration_id),
            'categorie_id' => fake()->randomElement($categorie_id),
            'modele_id' => fake()->randomElement($modele_id),
            'nom' => fake()->word(),
            'description' => fake()->sentence(),
            'prix' => fake()->randomFloat(),
            'delai_confection' => fake()->date()
        ];
    }
}
