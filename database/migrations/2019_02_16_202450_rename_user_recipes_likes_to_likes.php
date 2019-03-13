<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameUserRecipesLikesToLikes extends Migration
{

    private $oldTableName = 'user_recipe_likes';
    private $newTableName = 'likes';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->oldTableName)) {
            if (!Schema::hasTable($this->newTableName)) {
                Schema::rename($this->oldTableName, $this->newTableName);

                Schema::table($this->newTableName, function (Blueprint $table) {
                    $table->morphs('likeable');
                    $table->softDeletes();
                    $table->timestamps();
                    $table->foreign('user_id')->references('id')->on('users');
                });
            }
        } else {
            if (!Schema::hasTable($this->newTableName)) {
                Schema::create($this->newTableName, function (Blueprint $table) {
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
        Schema::dropIfExists($this->oldTableName);
        Schema::dropIfExists($this->newTableName);
    }
}
