<?php
	
	use Illuminate\Support\Facades\Schema;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;
	
	class CreateUniversTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('univers', function (Blueprint $table) {
				$table->increments('id');
				$table->string("name");
				$table->integer("first_creator");
				$table->integer("nb_recipes");
				$table->string("picture");
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
			Schema::dropIfExists('univers');
		}
	}
