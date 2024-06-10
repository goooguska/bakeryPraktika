<?php

namespace Database\Seeders;

use Database\Factories\BakerFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BakerFactory::new()->count(30)->create();

    }
}
