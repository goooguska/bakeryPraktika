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
    {    $images = [
        'croissant1.png',
        'croissant2.png',
        'sloyka1.png',
    ];
    $names = [
        'Круассан крем чиз с карамелью',
        'Круассан с шоколадом',
        'Слойка с яблоком и изюмом',
    ];
    $costs = [
        '195',
        '170',
        '170',
    ];
    $info = [
        'Воздушный круассан с творожным сыром и карамельным кремом, покрыт белым шоколадом',
        'Символ французского завтрака. Ароматная начинка из шоколада, которая придаёт лакомству особую изысканность и глубину вкуса',
        'Восхитительное сочетание хрустящей слойки с начинкой из свежих карамелизированных яблок, сладкого изюма и заварного молочного крема',
    ];
    $types = [
        'Круассаны',
        'Пирожки',
        'Десерты',
        'Печенье',
        'Хлеб',
        'Холодные напитки',
        'Горячие напитки',
    ];
  
        return [
            // 'name' => $this->faker->unique()->words(3, true),
            // 'cost' => $this->faker->randomNumber(3, true),
            // 'info' => $this->faker->paragraph(3),
            // 'image' => $this->faker->imageUrl,


            'name' => $this->faker->randomElement($names),
            'cost' => $this->faker->randomElement($costs),
            'info' => $this->faker->randomElement($info),
            'quantity' => $this->faker->randomNumber(2, true),
            'weight' => $this->faker->randomNumber(2, true),
            'image' => '/assets/images/' . $this->faker->randomElement($images),
            'type' => $this->faker->randomElement($types)
  
        ];
    }
}






