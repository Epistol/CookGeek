<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateUsersTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('pseudo')->nullable()->unique();
                $table->string('name')->nullable();
                $table->string('email')->nullable()->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('img');
                $table->string('password');
                $table->integer('nb_visites')->default(0);
                $table->boolean('traitement_donnees')->default(true);

                $table->rememberToken();
                $table->timestamps();
                $table->softDeletes();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('users');
        }
    }
