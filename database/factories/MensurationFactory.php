<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mensuration>
 */
class MensurationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $client_id = \App\Models\User::all()->pluck('id')->toArray();
        $useDetailedMeasurements = $this->faker->boolean;
        if($useDetailedMeasurements){
            return [
                'client_id' => fake()->randomElement($client_id),
                'label' => fake()->word(),
                'description' => fake()->sentence(),
                'mesures' => json_encode([
                    'poitrine' => $this->faker->numberBetween(80, 90),
                    'taille' => $this->faker->numberBetween(60, 70),
                    'hanches' => $this->faker->numberBetween(85, 95)
                ]),
                'taille' => null,
            ];
        }else{
            return [
                'client_id' => fake()->randomElement($client_id),
                'label' => fake()->word(),
                'description' => fake()->sentence(),
                'mesures' => null,
                'taille' => $this->faker->randomElement(['S', 'M', 'L', 'XL', 'XXL']),
            ];
        }

    }
}
