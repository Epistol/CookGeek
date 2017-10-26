<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDifficultyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * Difficulté d'une recette : simple;moyen,dur
     * @return void
     */
    public function up()
    {
        Schema::create('difficulty', function (Blueprint $table) {
            $table->increments('id');
	        $table->char("name");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('difficulty');
    }
}
