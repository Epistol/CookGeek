<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteRecipeImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('recipe_imgs');
        if (Schema::hasTable('recipe_likes')) {
            Schema::rename('recipe_likes', 'recipes_note');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('recipes_note')) {
            Schema::rename('recipes_note', 'recipe_likes');
        }
        Schema::dropIfExists('recipe_imgs');
    }
}
