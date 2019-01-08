<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersInfoLogginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('users_info_loggin', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('ip_address');
            $table->integer('account_state');
            $table->integer('login')->nullable();
            $table->integer('logout')->nullable();
            $table->integer('register')->nullable();
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
        Schema::dropIfExists('users_info_loggin');
    }
}
