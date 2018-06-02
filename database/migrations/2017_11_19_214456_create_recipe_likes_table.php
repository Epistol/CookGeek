<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
	class CreateRecipeLikesTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('recipe_likes', function (Blueprint $table) {
				$table->increments('id');
				$table->integer('id_recipe');
				$table->integer('id_user');
				$table->float('note');
				$table->timestamps();
				
				
//				$table->foreign('id_recipe')
//					->references('id')
//					->on('recipes');
//
//				$table->foreign('id_user')
//					->references('id')
//					->on('users');
				
				
			});
		}
		
		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down()
		{
			Schema::dropIfExists('recipe_likes');
		}
	}
