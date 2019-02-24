<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateUserRecompensesTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {

            /*
            * +---------------+---------+
            | Nom           | Type    |
            +---------------+---------+
            | id        | AI      |
            +---------------+---------+
            | user_id       | integer |
            +---------------+---------+
            | recompense_id | integer |
            +---------------+---------+
                */

            Schema::create('user_recompenses', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned();
                $table->integer('recompense_id')->unsigned();
//
                //				$table->foreign('user_id')
                //					->references('id')
                //					->on('user');
//
                //				$table->foreign('recompense_id')
                //					->references('id')
                //					->on('receompense');
//
                //				$table->primary(['id', 'user_id', 'recompense_id']);

                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('user_recompenses', function (Blueprint $table) {
                //				$table->dropForeign('user_recompenses_user_id_foreign');
//				$table->dropForeign('user_recompenses_recompense_id_foreign');
            });
        }
    }
