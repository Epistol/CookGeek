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
	    DB::table('type_recipes')->insert([
		    'name' => "Entrée"
	    ]);

	    DB::table('type_recipes')->insert([
		    'name' => "Plat"
	    ]);

	    DB::table('type_recipes')->insert([
		    'name' => "Dessert"
	    ]);

	    DB::table('type_recipes')->insert([
		    'name' => "Accompagnement"
	    ]);
	    DB::table('type_recipes')->insert([
		    'name' => "Amuse-bouche"
	    ]);
	    DB::table('type_recipes')->insert([
		    'name' => "Boisson"
	    ]);
	    DB::table('type_recipes')->insert([
		    'name' => "Confiserie"
	    ]);
	    DB::table('type_recipes')->insert([
		    'name' => "Sauce"
	    ]);
	    DB::table('type_recipes')->insert([
		    'name' => "Astuce"
	    ]);

    }
}
