<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateRecipesIngredientsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('recipes_ingredients', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('id_recipe')->nullable();
                $table->integer('id_ingredient')->nullable();
                $table->string('qtt')->nullable();

                //				$table->foreign('id_recipe')
//					->references('id')
//					->on('recipe');
//
//				$table->foreign('id_ingredient')
//					->references('id')
//					->on('ingredients');

//				$table->primary(['id', 'id_recipe', 'id_ingredient']);
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('recipes_ingredients');
        }
    }
