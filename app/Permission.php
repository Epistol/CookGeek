<?php

namespace App;

class Permission extends \Spatie\Permission\Models\Permission
{

    public static function generateFor($table_name)
    {
        $permission = Permission::create(['name' => 'browse_' . $table_name]);
        $permission = Permission::create(['name' => 'read_' . $table_name]);
        $permission = Permission::create(['name' => 'edit_' . $table_name]);
        $permission = Permission::create(['name' => 'add_' . $table_name]);
        $permission = Permission::create(['name' => 'delete_' . $table_name]);
    }
}
