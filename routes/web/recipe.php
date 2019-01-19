<?php
/**
 * Created by PhpStorm.
 * User: mikal
 * Date: 24/04/2018
 * Time: 23:25
 */

// RECETTE
Route::group(['prefix' => 'recette'], function () {
    Route::get('/', 'Recipe\RecipesController@index')->name("recipe.index")->middleware('cacheResponse:2');
    Route::get('ajout', 'Recipe\RecipesController@add')->name("recipe.add")->middleware('auth');
	Route::post('store', 'Recipe\RecipesController@store')->name("recipe.store")->middleware('auth');

    Route::get('edit/{post}', 'Recipe\RecipesController@edit')->name("recipe.edit")->middleware('auth');
	Route::post('update/{id}', 'Recipe\RecipesController@update')->name("recipe.edition")->middleware('auth');

    Route::get('{post}', 'Recipe\RecipesController@show')->name("recipe.show")->middleware('cacheResponse:10');

    Route::post('addmypicture', 'PictureController@addPictureToRecipe')->name("recipe.picture.store")->middleware('auth');

});

//Route::post('gf18', 'PageController@store_gf')->name("form.store");