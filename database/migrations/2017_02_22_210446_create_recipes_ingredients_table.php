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
		    $table->integer('id_recipe')->nullable();
		    $table->integer('id_ingredient')->nullable();
		    $table->string('lib_ingredient')->nullable();
		    $table->string('qtt')->nullable();
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
