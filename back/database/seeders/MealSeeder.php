<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meals')->insert([
            'title' => 'breakfast'
        ]);

        DB::table('meals')->insert([
            'title' => 'lunch'
        ]);

        DB::table('meals')->insert([
            'title' => 'dinner'
        ]);
    }
}
