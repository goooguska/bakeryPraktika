<?php

namespace Database\Factories;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
     
            'name' => $this->faker->unique()->words(3, true),
            'cost' => $this->faker->randomNumber(3, true),
            'info' => $this->faker->paragraph(3),
            'quantity' => $this->faker->randomNumber(2, true),
            'weight' => $this->faker->randomNumber(3, true),
            'image' => $this->faker->imageUrl,
            'type' => $this->faker->randomElement(['Круассаны', 'Пирожки', 'Десерты', 'Печенье', 'Хлеб','Холодные напитки','Горячие напитки'])




         
        ];
    }
}






