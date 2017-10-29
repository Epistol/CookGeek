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
		    $table->string('title');
		    // Slug = titre+id
		    $table->string("slug")->nullable();
		    // Difficulte : simple, moyen, difficile
		    $table->tinyInteger('difficulty')->nullable();
		    // Type : Entrée, plat, dessert
		    $table->tinyInteger('type')->nullable();
			// Cout des ingrédients
		    $table->tinyInteger('cost')->nullable();
		    // TEMPS
		    $table->smallInteger('prep_time')->nullable();
		    $table->smallInteger('cook_time')->nullable();
		    $table->smallInteger('rest_time')->nullable();
		    // Remarque
			$table->longText('commentary_author')->nullable();
			// Nombre de parts
			$table->smallInteger('nb_guests')->nullable();
			// Univers associé :
			$table->string('univers')->nullable();
			// Type univers : manga, livre, film, etc
		    $table->integer('type_univers')->nullable();
		    // Auteur ID
		    $table->integer('id_user');
		    // Vege ? Oui / Non
		    $table->boolean("vegetarien")->nullable();
		    // Site d'origine
			$table->text('origin_url_website')->nullable();
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
