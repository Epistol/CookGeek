<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeartbeatTable extends Migration
{
    /**
     * Run the migrations.
     *  Petit message sur l'accueil
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heartbeat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('recipe_id')->nullable();
            $table->text('image_id')->nullable();
            $table->text("texte");
            $table->text("invite")->nullable();
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
        Schema::dropIfExists('heartbeat');
    }
}
