<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipeLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('recipe_likes')) {
            Schema::rename('recipe_likes', 'recipes_note');
        }

        if (!Schema::hasTable('recipes_note')) {
            Schema::create('recipes_note', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('recipe_id');
                $table->integer('user_id');
                $table->float('note');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('recipe_likes')) {
            Schema::rename('recipe_likes', 'recipes_note');
        }
        Schema::dropIfExists('recipes_note');
    }
}
