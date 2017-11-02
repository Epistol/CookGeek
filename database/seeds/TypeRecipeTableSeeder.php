<?php

use Illuminate\Database\Seeder;

class TypeRecipeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('type_recipe')->insert([
		    'name' => "Entrée"
	    ]);

	    DB::table('type_recipe')->insert([
		    'name' => "Plat"
	    ]);

	    DB::table('type_recipe')->insert([
		    'name' => "Dessert"
	    ]);

	    DB::table('type_recipe')->insert([
		    'name' => "Accompagnement"
	    ]);
	    DB::table('type_recipe')->insert([
		    'name' => "Amuse-bouche"
	    ]);
	    DB::table('type_recipe')->insert([
		    'name' => "Boisson"
	    ]);
	    DB::table('type_recipe')->insert([
		    'name' => "Confiserie"
	    ]);
	    DB::table('type_recipe')->insert([
		    'name' => "Sauce"
	    ]);
	    DB::table('type_recipe')->insert([
		    'name' => "Tutoriel"
	    ]);

    }
}
