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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->date('creation_date');
            $table->date('expiration_date');
            $table->integer('money')->default(0);
            $table->integer('breakfast')->default(0);
            $table->integer('lunch')->default(0);
            $table->integer('dinner')->default(0);
            $table->integer('room')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
};
