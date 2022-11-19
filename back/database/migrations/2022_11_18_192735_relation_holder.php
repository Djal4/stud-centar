<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //user table relations
        
        Schema::table('users', function(Blueprint $table) {
            //user-role tables relation
            $table->foreignId('role_id')->constrained('roles');
        });

        Schema::table('cards', function(Blueprint $table) {
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('card_type_id')->constrained('card_type');
            $table->foreignId('pavilion_id')->nullable()->constrained('pavilions');
        });

        Schema::table('accomodation_payments', function(Blueprint $table) {
            $table->foreignId('card_id')->constrained('cards');
        });

        Schema::table('meal_prices', function(Blueprint $table) {
            $table->foreignId('card_type_id')->constrained('card_type');
            $table->foreignId('meal_id')->constrained('meals');
        });

        Schema::table('tickets', function(Blueprint $table) {
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('parent_id')->nullable()->constrained('tickets');
        });

        Schema::table('posts', function(Blueprint $table) {
            $table->foreignId('author_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
