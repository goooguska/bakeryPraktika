<?php

namespace Database\Seeders;

use Database\Factories\BakedProductFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BakedProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BakedProductFactory::new()->count(30)->create();

    }
}
