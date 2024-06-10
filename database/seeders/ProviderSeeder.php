<?php

namespace Database\Seeders;

use Database\Factories\ProviderFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProviderFactory::new()->count(30)->create();

    }
}
