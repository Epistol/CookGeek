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
            ['name' => 'Entrée'],
            ['name' => 'Plat'],
            ['name' => 'Dessert'],
            ['name' => 'Accompagnement'],
            ['name' => 'Amuse-bouche'],
            ['name' => 'Boisson'],
            ['name' => 'Confiserie'],
            ['name' => 'Sauce'],
            ['name' => 'Astuce'],
        ]);
    }
}
