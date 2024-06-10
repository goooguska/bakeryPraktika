<?php

namespace Database\Factories;

use App\Models\Baker;
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
            'productRecipe_id' => function(){
                return ProductRecipe::inRandomOrder()->first()->id;
            },
            'date_baking' => $this->faker->date(),
            'date_sale' => $this->faker->date(),

        ];
    }
}
