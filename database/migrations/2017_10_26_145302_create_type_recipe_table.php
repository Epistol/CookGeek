<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Type de recette : entrée, plat, dessert, etc
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_recipes');
    }
}
