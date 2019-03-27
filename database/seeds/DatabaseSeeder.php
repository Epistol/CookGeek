<?php

use App\Permission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,

            CategUnivTableSeeder::class,
            DifficultyTableSeeder::class,
            TypeRecipeTableSeeder::class,

            // Generate permissionss
            PermissionsTableSeeder::class,
            // Create and associate roles to permissions
        ]);
        $this->call([PermissionRoleTableSeeder::class]);
    }
}
