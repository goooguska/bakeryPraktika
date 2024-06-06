<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductRecipe;
use App\Models\Recipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductRecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $recipes = Recipe::all();
        $products = Product::all();
        
        ProductRecipe::factory()
        ->count(7)
        ->for(
            $recipes->isEmpty() ? Recipe::factory() : $recipes->random()
        )
        ->for(
            $products->isEmpty() ? Product::factory() : $products->random()
        )
        ->create();
    }
}
