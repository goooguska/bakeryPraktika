<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Database\Factories\IngredientFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
        IngredientFactory::new()->count(30)->create();

    }
}
