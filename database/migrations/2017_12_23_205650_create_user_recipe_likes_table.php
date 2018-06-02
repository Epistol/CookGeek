<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
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
				
//				$table->foreign('user_id')
//					->references('id')
//					->on('users');
//
//				$table->foreign('recipe_id')
//					->references('id')
//					->on('recipes');
//
//				$table->primary(['id', 'user_id', 'recipe_id']);
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
