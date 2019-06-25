<?php

namespace App;

class Permission extends \Spatie\Permission\Models\Permission
{

    /**
     * @param $table_name
     */
    public static function generateFor($table_name)
    {
        $bread = ['browse', 'read', 'edit', 'add', 'delete'];
        foreach ($bread as $element) {
            Permission::create([
                'name' => $element . '_' . $table_name,
                'key' => $element . '_' . $table_name,
                'table_name' => $table_name,
            ]);
        }
    }

    public static function getBreadPermissions($table_name)
    {
        $bread = ['browse', 'read', 'edit', 'add', 'delete'];
        $permission = [];
        foreach ($bread as $element) {
            $permission = array_push($permission, $element . '_' . $table_name);
        }
        return $permission;
    }
}
