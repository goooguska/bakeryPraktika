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
        $ingredients = [
            "пшеничная мука",
            "вода",
            "сахар",
            "соль",
            "дрожжи",
            "масло растительное",
            "молоко",
            "яйца",
            "сливочное масло",
            "мед",
            "мак",
            "кунжут",
            "семена льна",
            "ванильный сахар",
            "разрыхлитель",
            "кефир",
            "тмин",
            "изюм",
            "сухое молоко",
            "овсяные хлопья"
        ];
        
        return [
            'provider_id' => function(){
                return Provider::inRandomOrder()->first()->id;
            },
            
            'name' => $this->faker->randomElement($ingredients),
            'quantity' => $this->faker->randomNumber(2, false),
        ];
    }
}
