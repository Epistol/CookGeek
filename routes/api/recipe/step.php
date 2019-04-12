<?php
/**
 * Created by PhpStorm.
 * @package : cdg_reload
 * @author  : michael
 * @license : https://creativecommons.org/licenses/by-nd/4.0/
 * Date: 2019-04-12
 * Time: 14:29
 */

Route::post('/recipe/get_steps/', 'Api\RecipeController@get_steps')->name('api.recipe.get_steps');
