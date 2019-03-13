<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            if (!Schema::hasTable('likes')) {
                Schema::rename('user_recipe_likes', 'likes');

                Schema::table('likes', function (Blueprint $table) {
                    $table->dropColumn('user_id');
                    $table->dropColumn('recipe_id');

                    $table->unsignedInteger('user_id')->nullable();
                    $table->morphs('likeable');
                    $table->softDeletes();
                    $table->timestamps();
                    $table->foreign('user_id')->references('id')->on('users');
                });
            }
        } else {
            if (!Schema::hasTable('likes')) {
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_recipe_likes');
        Schema::dropIfExists('likes');
    }
}
