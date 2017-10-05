<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('recipes_ingredients', function (Blueprint $table) {
		    $table->increments('id');
		    $table->integer('id_recipe');
		    $table->integer('id_ingredient');
		    $table->string('lib_ingredient');
		    $table->string('qtt');
	    });




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('recipes_ingredients');
    }
}
