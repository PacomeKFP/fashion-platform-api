<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paiement>
 */
class PaiementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $commande_id = \App\Models\Commande::all()->pluck('id')->toArray();
        return [
            'commande_id' =>fake()->randomElement($commande_id),
            'montant' => fake()->randomFloat(),
            'date_paiement' => fake()->dateTime(),
            'statut_paiement' => fake()->randomElement(['en_attente','terminé','echec']),
        ];
    }
}
