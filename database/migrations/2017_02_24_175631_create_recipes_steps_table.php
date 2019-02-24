<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateRecipesStepsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('recipes_steps', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('recipe_id');
                $table->integer('step_number');
                $table->longText('instruction');

                //				$table->foreign('recipe_id')
//					->references('id')
//					->on('recipes');
//
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('recipes_steps');
        }
    }
