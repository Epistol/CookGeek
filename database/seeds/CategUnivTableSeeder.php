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
            'name' => 'anime',
        ]);
        DB::table('categunivers')->insert([
            'name' => 'comics',
        ]);
        DB::table('categunivers')->insert([
            'name' => 'gaming',
        ]);
        DB::table('categunivers')->insert([
            'name' => 'livres',
        ]);
        DB::table('categunivers')->insert([
            'name' => 'tv',
        ]);
    }
}
