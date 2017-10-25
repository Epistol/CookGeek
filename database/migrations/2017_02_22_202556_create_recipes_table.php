<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('recipes', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string("slug");
		    $table->string('title');
		    $table->tinyInteger('difficulty');
		    $table->tinyInteger('type');
		    $table->tinyInteger('cost');
		    $table->smallInteger('prep_time');
		    $table->smallInteger('cook_time');
		    $table->smallInteger('rest_time');
			$table->longText('commentary_author');
		    $table->string('url_img');
			$table->smallInteger('nb_guests');
			$table->integer('id_universe');
		    $table->integer('id_universe_category');
		    $table->integer('id_user');
			$table->integer('nb_views');
			$table->text('origin_url_website');
		    $table->timestamps();
	    });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::dropIfExists('recipes');
    }
}
