<?php

namespace Database\Factories;

use App\Models\Baker;
use App\Models\Product;
use App\Models\ProductRecipe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BakedProduct>
 */
class BakedProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'baker_id' => function(){
                return Baker::inRandomOrder()->first()->id;
            },
            'product_id' => function(){
                return Product::inRandomOrder()->first()->id;
            },
            'date_baking' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'date_sale' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'quantity' => $this->faker->randomNumber(2, false),


        ];
    }
}
