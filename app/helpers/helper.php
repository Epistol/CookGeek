<?php
/**
 * Created by PhpStorm.
 * @package : cdg_reload
 * @author  : michael
 * @license : https://creativecommons.org/licenses/by-nd/4.0/
 * Date: 2019-03-19
 * Time: 18:26
 */

use Illuminate\Support\Arr;

if (!function_exists('generateCrud')) {
    function generateCrud($model, bool $extended, bool $group)
    {
        $crud         = ['view', 'create', 'read', 'update', 'delete'];
        $crudExtended = ['restore', 'forceDelete'];
        $grouped      = [
            'view-' . $model . '-from-group',
            'update-' . $model . '-from-group',
            'delete-' . $model . '-from-group'
        ];

        $data = [];

        if ($extended) {
            $crud = Arr::collapse([$crud, $crudExtended]);
        }
        if ($group) {
            $crud = Arr::collapse([$crud, $grouped]);
        }
        foreach ($crud as $element) {
            $data[] = $element . "-" . $model;
        }
        return $data;
    }
}


if (!function_exists('cleanInput')) {
    /**
     * @param $input
     *
     * @return string
     */
    function cleanInput($input)
    {
        return strip_tags($input);
    }
}
