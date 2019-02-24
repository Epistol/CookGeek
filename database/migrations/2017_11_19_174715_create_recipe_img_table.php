<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateRecipeImgTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('recipe_imgs', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('recipe_id');
                $table->integer('user_id');
                $table->string('image_name');
                $table->timestamps();

                //				$table->foreign('recipe_id')
//					->references('id')
//					->on('recipes');
//
//				$table->foreign('user_id')
//					->references('id')
//					->on('users');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('recipe_imgs');
        }
    }
