<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->insert([
            'name' => 'Epistol',
            'email' => 'epistolshow@gmail.com',
            'password' => bcrypt(env('ADMIN_PASS')),
        ]);
    }
}
