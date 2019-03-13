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
            ['name' => 'Noob'],
            ['name' => 'Moyen'],
            ['name' => 'Difficile'],
        ]);
    }
}
