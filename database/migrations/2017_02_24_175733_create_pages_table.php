<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
	class CreatePagesTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('pages', function (Blueprint $table) {
				$table->increments('id');
				$table->string('slug');
				$table->string('name');
				$table->longText('content');
				$table->integer('author_id');
				$table->timestamps();
				
//				$table->foreign('author_id')
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
			Schema::dropIfExists('pages');
		}
	}
