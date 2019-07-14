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
            $table->increments('id'); // Unique id
            $table->integer('ingredient_id'); // ingredient id from table
            $table->string('locale'); // locale
            $table->morphs('ingredientable'); // ingredientable_id & ingredientable_type, the id of the recipe for example
            $table->string('quantity');
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
