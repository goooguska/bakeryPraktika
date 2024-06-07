<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductRecipe;
use App\Models\Recipe;
use Database\Factories\ProductRecipeFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductRecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
        ProductRecipeFactory::new()->count(6)->create();
   
    }
}
