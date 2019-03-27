<?php
/**
 * Created by PhpStorm.
 * User: mikal
 * Date: 24/04/2018
 * Time: 23:25.
 */

Route::resource('recipe', 'Recipe\RecipeController');

// RECETTE
Route::group(['prefix' => 'recipe'], function () {
    Route::get('/', 'Recipe\RecipeController@index')->name('recipe.index')->middleware('cacheResponse:2');
    Route::post('addmypicture', 'PictureController@addPictureToRecipe')->name('recipe.picture.store')->middleware('auth');
});

//Route::post('gf18', 'PageController@store_gf')->name("form.store");
