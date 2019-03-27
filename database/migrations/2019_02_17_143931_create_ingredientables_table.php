<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredientables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ingredient_id');
            $table->string('locale');
            // Not sure about that, i could simplify by
            // creating another table with relation but heh, it's not for the amount of data ...
            $table->morphs('ingredientable');
            $table->string('quantity');

            $table->unique(['ingredientable_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredientables');
    }
}
