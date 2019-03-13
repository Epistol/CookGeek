<?php

use Illuminate\Database\Seeder;

class CategUnivTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * anime, livre, etc.
     *
     * @return void
     */
    public function run()
    {
        // TODO : remplacer le nom de la table par "medias"
        DB::table('categunivers')->insert([
            ['name' => 'anime'],
            ['name' => 'comics'],
            ['name' => 'gaming'],
            ['name' => 'livres'],
            ['name' => 'tv'],
        ]);
    }
}
