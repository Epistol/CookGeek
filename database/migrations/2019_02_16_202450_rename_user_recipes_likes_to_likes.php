<?php

use Illuminate\Database\Migrations\Migration;
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
        if (Schema::hasTable($this->newTableName)) {
            if (!Schema::hasTable($this->oldTableName)) {
                Schema::rename($this->newTableName, $this->oldTableName);
            }
        }
    }
}
