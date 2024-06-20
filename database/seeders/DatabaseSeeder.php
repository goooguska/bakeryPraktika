<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            ProviderSeeder::class,
            NewsSeeder::class,
            RecipeSeeder::class,
            IngredientSeeder::class,
            RecipeIngredientSeeder::class,
            ProductSeeder::class,
            ProductRecipeSeeder::class,
            UserSeeder::class,
            BakerSeeder::class,
            BakedProductSeeder::class,
            SaleSeeder::class,

        ]);


    }
}
