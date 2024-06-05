<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\RecipeIngredients;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipeIngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipes = Recipe::all();
        $ingredients = Ingredient::all();

        RecipeIngredients::factory()
            ->count(7)
            ->for(
                $recipes->isEmpty() ? Recipe::factory() : $recipes->random()
            )
            ->for(
                $ingredients->isEmpty() ? Ingredient::factory() : $ingredients->random()
            )
            ->create();
    }
}
