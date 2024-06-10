<?php

namespace Database\Factories;

use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingredient>
 */
class IngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'provider_id' => function(){
                return Provider::inRandomOrder()->first()->id;
            },
            'name' => $this->faker->unique()->words(1,true),
            'quantity' => $this->faker->randomNumber(2, false),
        ];
    }
}
