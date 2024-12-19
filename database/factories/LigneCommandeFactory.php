<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LigneCommande>
 */
class LigneCommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $commande_id = \App\Models\Commande::all()->pluck('id')->toArray();
        $produit_id = \App\Models\Produit::all()->pluck('id')->toArray();
        return [
            'commande_id' => fake()->randomElement($commande_id),
            'produit_id' => fake()->randomElement($produit_id),
            'quantite' => fake()->randomNumber()
        ];
    }
}
