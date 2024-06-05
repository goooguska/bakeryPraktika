<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            NewsSeeder::class,
            RecipeSeeder::class,
            IngredientSeeder::class,
            RecipeIngredientsSeeder::class,
            ProductSeeder::class,



        ]);

    }
}
