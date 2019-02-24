<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateRecompenseTable extends Migration
    {
        /**
         * TODO Penser au systeme de recompense, pour l'instant je laisse un id, title et roule
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('recompense', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('recompense');
        }
    }
