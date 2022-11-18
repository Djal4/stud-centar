<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CardTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('card_type')->insert([
            'title'=>'Budget'
        ]);

        DB::table('card_type')->insert([
            'title'=>'Self financing'
        ]);
    }
}
