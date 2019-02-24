<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateCateguniversTable extends Migration
    {
        /**
         * Run the migrations.
         *
         *  Manga, films, musique, etc
         *
         * @return void
         */
        public function up()
        {
            Schema::create('categunivers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('img_url')->nullable();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('categunivers');
        }
    }
