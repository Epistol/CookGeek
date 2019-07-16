<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        // Super Admin
        $superAdmin = Role::firstOrNew(['name' =>  'super-admin']);
        if (!$superAdmin->exists) {
            $superAdmin->fill([
                'display_name' => 'super-admin',
            ])->save();
        }
        $permissions = Permission::all();
        $superAdmin->permissions()->sync(
            $permissions->pluck('id')->all()
        );

        // User
        $user = Role::firstOrNew(['name' => 'user']);
        if (!$user->exists) {
            $user->fill([
                'display_name' => __('voyager::seeders.roles.user'),
            ])->save();
        }
        $user->syncPermissions([
            'browse_users',
            'read_users',
            'edit_users',

            'browse_recipes',
            'read_recipes',
            'edit_recipes',
            'add_recipes',
            'delete_recipes',

            'browse_universes',
            'read_universes',
            'add_universes',

            'browse_images',
            'read_images',
            'edit_images',
            'add_images',
            'delete_images' ,

            'browse_ingredients',
            'read_ingredients',
            'edit_ingredients',
            'add_ingredients',

            'browse_pages',
            'read_pages',

            'browse_posts',
            'read_posts',

        ]);
        // Banned
        $ban = Role::firstOrNew(['name' =>  'banned']);
        if (!$ban->exists) {
            $ban->fill([
                'display_name' => 'banned',
            ])->save();
        }
        // no role, is banned
    }
}
