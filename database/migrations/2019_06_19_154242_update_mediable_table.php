<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMediableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mediables', function (Blueprint $table) {
            if (!Schema::hasColumns('mediables', ['valid'])) {
                $table->boolean('valid')->default(false);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mediables', function (Blueprint $table) {
            if (Schema::hasColumns('mediables', ['valid'])) {
                $table->removeColumn('valid');
            }
        });
    }
}
