<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CardTypeSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\MealSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CardTypeSeeder::class,
            MealSeeder::class,
            RoleSeeder::class,
        ]);
    }
}
