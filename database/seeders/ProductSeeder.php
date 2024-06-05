<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Recipe;
use App\Models\RecipeIngredients;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipes = Recipe::all();
        $recipeIngredients = RecipeIngredients::all();


        Product::factory()
            ->count(7)
           
            ->hasAttached(
                $recipeIngredients->isEmpty() ? RecipeIngredients::factory() : $recipeIngredients->random()
            )
            ->create();
    }
}
