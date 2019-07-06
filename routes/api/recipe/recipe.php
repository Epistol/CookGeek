<?php
/**
 * Created by PhpStorm.
 * @package : cdg_reload
 * @author  : michael
 * @license : https://creativecommons.org/licenses/by-nd/4.0/
 * @link    : Bitbucket // TODO : Change
 * Date: 2019-04-12
 * Time: 14:31
 */

Route::post('/recipe/get_ingredients/', 'Api\RecipeController@get_ingredients')->name('api.recipe.get_ingredients');
Route::post('/recipe/alerte/', 'Api\RecipeController@alerte')->name('api.recipe.alerte');

Route::post('/note', 'Api\NoteController@checknote')->name('api.like.checknote');


Route::get('/difficulty', 'Api\RecipeController@getDifficulties')->name('api.difficulty');
Route::get('/recipe/category', 'Api\RecipeController@getCategories')->name('api.category');
