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
            //  'recipe_id' => function(){
            //     return Recipe::isRandomOrder()->first()->id;
            // },
            'name' => $this->faker->unique()->words(3, true),
            'cost' => $this->faker->randomFloat(2,7,3),
            'info' => $this->faker->paragraph(3),

         
        ];
    }
}
