<?php

use Illuminate\Database\Seeder;
use App\Permission;
use Spatie\Permission\Models\Role;

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
            Permission::create(['name' => $key, 'key'=> $key]);
        }

        Permission::generateFor('menus');
        Permission::generateFor('roles');
        Permission::generateFor('users');
        Permission::generateFor('settings');

        Permission::generateFor('universes');
        Permission::generateFor('recipes');
        Permission::generateFor('images');
        Permission::generateFor('ingredients');
        Permission::generateFor('pages');
        Permission::generateFor('posts');

    }
}
