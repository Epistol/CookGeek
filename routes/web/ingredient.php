<?php
/**
 * Created by PhpStorm.
 * User: mikal
 * Date: 24/04/2018
 * Time: 23:25
 */

// RECETTE
Route::group(['prefix' => 'ingredient'], function () {
    Route::get('/', 'RecipesIngredientController@index')->name("ingredient.index");

    Route::get('{post}', 'RecipesIngredientController@show')->name("ingredient.show")->middleware('cacheResponse:10');
});

//Route::post('gf18', 'PageController@store_gf')->name("form.store");