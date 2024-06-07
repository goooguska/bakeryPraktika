<?php

namespace Database\Seeders;

use Database\Factories\RecipeIngredientFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipeIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RecipeIngredientFactory::new()->count(30)->create();

    }
}
