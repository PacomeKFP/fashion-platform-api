<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AvisClient>
 */
class AvisClientFactory extends Factory
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
        return [
            'produit_id' => fake()->randomElement($produit_id),
            'user_id' => fake()->randomElement($user_id),
            'note' => fake()->randomNumber(),
            'commentaire' => fake()->sentence()
        ];
    }
}
