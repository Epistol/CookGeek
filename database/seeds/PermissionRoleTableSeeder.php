<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Role;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = Role::where('name', 'super-admin')->firstOrFail();
        $permissions = Permission::all();
        $superAdmin->permissions()->sync(
            $permissions->pluck('id')->all()
        );

        $user = Role::firstOrCreate(['name' => 'user']);

        $user->syncPermissions([
            'browse-users',
            'read-users',
            'edit-users',
            'delete-users',

            'browse-recipes',
            'read-recipes',
            'edit-recipes',
            'add-recipes',
            'delete-recipes',

            'browse-images',
            'read-images',
            'edit-images',
            'add-images',
            'delete-images' ,

            'browse-ingredients',
            'read-ingredients',
            'edit-ingredients',
            'add-ingredients',
            'delete-ingredients',

            'browse-pages',
            'read-pages',

            'browse-posts',
            'read-posts',

        ]);


    }
}
