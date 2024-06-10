<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Provider>
 */
class ProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->company(),
            'cost' => $this->faker->randomNumber(3, true),
            'quantity' => $this->faker->randomNumber(2, true),
            'date_of_delivery' => $this->faker->date(),
        ];
    }
}
