<?php

namespace Database\Factories;

use App\Models\BakedProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => function(){
                
                return Product::inRandomOrder()->first()->id;
                },
                'user_id' => function(){
                return User::inRandomOrder()->first()->id;
                },
            'date_sale' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'quantity' => $this->faker->randomNumber(2, false),


        ];
    }
}
