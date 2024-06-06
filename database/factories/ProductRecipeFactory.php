<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductRecipe>
 */
class ProductRecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'recipe_id' => function(){
                return Recipe::inRandomOrder()->first()->id;
            },
            'product_id' => function(){
                return Product::inRandomOrder()->first()->id;
            },
        ];
    }
}
