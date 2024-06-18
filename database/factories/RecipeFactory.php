<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $recipes = [
            "рецепт 1" ,"рецепт 2" ,"рецепт 3" ,"рецепт 4" ,"рецепт 5" ,"рецепт 6" ,"рецепт 7" ,"рецепт 8" ,"рецепт 9" ,"рецепт 10" ,"рецепт 11" ,"рецепт 12" ,"рецепт 13" ,"рецепт 14" ,"рецепт 15" ,"рецепт 16" ,"рецепт 17" ,"рецепт 18" ,"рецепт 19" ,"рецепт 20" ,"рецепт 21" ,"рецепт 22" ,"рецепт 23" ,"рецепт 24" ,"рецепт 25" ,"рецепт 26" ,"рецепт 27" ,"рецепт 28" ,"рецепт 29" ,"рецепт 30"
        ];
    
        return [
            'name' => $this->faker->unique()->randomElement($recipes),
            'info' => $this->faker->unique()->paragraph(3),
            'baking_time' => $this->faker->time(),
        ];
    }
}
