<?php

use App\User as UserAlias;
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
        $user = UserAlias::firstOrCreate([
            'name' => 'Epistol',
            'email' => 'epistolshow@gmail.com',
            'password' => bcrypt(env('ADMIN_PASS')),
        ]);
        $user->assignRole('super-admin');
    }
}
