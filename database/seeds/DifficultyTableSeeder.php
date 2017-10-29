<?php

use Illuminate\Database\Seeder;

class DifficultyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('difficulty')->insert([
		    'name' => "Noob"
	    ]);



	    DB::table('difficulty')->insert([
		    'name' => "Moyen"
	    ]);

	    DB::table('difficulty')->insert([
		    'name' => "Difficile"
	    ]);


    }
}
