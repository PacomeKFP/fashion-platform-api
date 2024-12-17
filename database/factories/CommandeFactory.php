<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commande>
 */
class CommandeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_id = \App\Models\User::all()->pluck('id')->toArray();
        $produit_id = \App\Models\Produit::all()->pluck('id')->toArray();
        $styliste_id = \App\Models\Produit::all()->pluck('id')->toArray();
        return [
            'produit_id' => fake()->randomElement($produit_id),
            'user_id' => fake()->randomElement($user_id),
            'styliste_id' => fake()->randomElement($styliste_id),
            'statut' => fake()->randomElement(['en attente','en cours','terminé']),
            'prix_total' => fake()->randomFloat(),
            'date_commande' => fake()->dateTime()
        ];
    }
}
