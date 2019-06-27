<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCateguniversTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categunivers_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('categunivers_id')->unsigned();
            $table->string('locale')->index();
            $table->string('name');
            $table->unique(['categunivers_id', 'locale']);
            $table->foreign('categunivers_id')->references('id')
                ->on('categunivers')->onDelete('cascade');
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
        Schema::dropIfExists('categunivers_translations');
    }
}
