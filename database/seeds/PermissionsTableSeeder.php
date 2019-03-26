<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $keys = [
            'browse_admin',
            'browse_bread',
            'browse_database',
            'browse_media',
            'browse_compass',
        ];

        foreach ($keys as $key) {
            $permission = Permission::create(['name' => $key]);
        }

        Permission::generateFor('menus');
        Permission::generateFor('roles');
        Permission::generateFor('users');
        Permission::generateFor('settings');

        Permission::generateFor('universe');
        Permission::generateFor('recipe');
        Permission::generateFor('image');
        Permission::generateFor('ingredient');
        Permission::generateFor('page');
        Permission::generateFor('post');
    }
}
