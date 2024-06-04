<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'name' => $this->faker->unique()->sentence(5),
            'date_news' => $this->faker->date(),
            'info' => $this->faker->sentence(30),
            'image' => $this->faker->imageUrl
        ];

    }
}
