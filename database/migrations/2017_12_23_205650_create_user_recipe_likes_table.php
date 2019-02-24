<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateUserRecipeLikesTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('user_recipe_likes', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id');
                $table->integer('recipe_id');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('user_recipe_likes');
        }
    }
