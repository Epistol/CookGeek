<?php
/**
 * Created by PhpStorm.
 * User: mikal
 * Date: 04/02/2018
 * Time: 00:34
 */

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    const ADMIN = 'admin';
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);
        Permission::create(['name' => ADMIN ]);

        // create roles and assign existing permissions
        $role = Role::create(['name' => 'writer']);
        $role->givePermissionTo('edit articles');
        $role->givePermissionTo('delete articles');

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('publish articles');
        $role->givePermissionTo('unpublish articles');
        $role->givePermissionTo(ADMIN);

        $role = Role::create(['name' => 'user']);

    }
}
