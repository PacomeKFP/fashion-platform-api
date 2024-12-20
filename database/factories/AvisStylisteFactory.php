<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AvisStyliste>
 */
class AvisStylisteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_id = \App\Models\User::all()->pluck('id')->toArray();
        $styliste_id = \App\Models\Styliste::all()->pluck('id')->toArray();
        return [
            'styliste_id' => fake()->randomElement($styliste_id),
            'user_id' => fake()->randomElement($user_id),
            'note' => fake()->randomNumber(),
            'commentaire' => fake()->sentence()
        ];
    }
}
