<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
	class CreateSearchesTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('searches', function (Blueprint $table) {
				$table->increments('id');
				$table->text('search_text');
				$table->integer('user_id');
				$table->timestamps();
				
//				$table->foreign('user_id')
//					->references('id')
//					->on('users');
//
				
			});
		}
		
		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down()
		{
			Schema::dropIfExists('searches');
		}
	}
