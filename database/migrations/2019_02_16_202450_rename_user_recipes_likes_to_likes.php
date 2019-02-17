<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameUserRecipesLikesToLikes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('user_recipe_likes')) {
            Schema::rename('user_recipe_likes', 'likes');
            Schema::table('likes', function (Blueprint $table) {
                $table->dropColumn('user_id');
                $table->dropColumn('recipe_id');

                $table->morphs('likeable');
                $table->softDeletes();
                $table->timestamps();
                $table->foreign('user_id')->references('id')->on('users');
            });
        } else {
            Schema::create('likes', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('user_id')->nullable();

                $table->morphs('likeable');
                $table->softDeletes();
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users');
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
        if (Schema::hasTable('user_recipe_likes')) {
            Schema::rename('user_recipe_likes', 'likes');
        }
        else {
            Schema::dropIfExists('likes');
        }
    }
}
