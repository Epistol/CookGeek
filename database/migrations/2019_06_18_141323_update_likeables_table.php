<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLikeablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('likeables', function (Blueprint $table) {
            if (Schema::hasColumns('likeables', ['likable_id', 'likable_type'])) {
                $table->renameColumn('likable_id', 'likeable_id');
                $table->renameColumn('likable_type', 'likeable_type');
            }

            if (Schema::hasColumns('likeables', ['id'])) {
                $table->renameColumn('id', 'like_id');
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
        Schema::table('likeables', function (Blueprint $table) {
            if (Schema::hasColumns('likeables', ['likeable_id', 'likeable_type'])) {
                $table->renameColumn('likeable_id', 'likable_id');
                $table->renameColumn('likeable_type', 'likable_type');
            }
            if (Schema::hasColumns('likeables', ['like_id'])) {
                $table->renameColumn('like_id', 'id');
            }
        });
    }
}
