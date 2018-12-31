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
    Route::get('ajouttest', 'Recipe\RecipesController@addtest')->name("recipe.addtest")->middleware('auth');
	Route::post('store', 'Recipe\RecipesController@store')->name("recipe.store")->middleware('auth');

	Route::get('test', 'Recipe\RecipesController@test')->name("recipe.test")->middleware('auth');
    Route::get('edit/{post}', 'Recipe\RecipesController@edit')->name("recipe.edit")->middleware('auth');
	Route::post('update/{id}', 'Recipe\RecipesController@update')->name("recipe.edition")->middleware('auth');
//    Route::post('store_test', 'Recipe\RecipesController@store_test')->name("recipe.store_test");





    Route::get('{post}', 'Recipe\RecipesController@show')->name("recipe.show")->middleware('cacheResponse:10');


//RECETTE/TYPE

});

Route::post('gf18', 'PageController@store_gf')->name("form.store");