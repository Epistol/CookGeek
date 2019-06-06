<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameStepablesColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stepables', function (Blueprint $table) {
            $table->renameColumn('step_id', 'recipes_steps_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stepables', function (Blueprint $table) {
            $table->renameColumn('recipes_steps_id', 'step_id');
        });
    }
}
