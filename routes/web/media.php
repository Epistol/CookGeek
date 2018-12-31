<?php


// RECETTE/MEDIA
Route::group(['prefix' => 'media'], function () {
	Route::get('/', 'Recipe\MediaController@index')->name("media.index");
	/*        Route::get('ajout', 'Recipe\RecipesController@add')->name("media.add")->middleware('auth');
			Route::post('ajout', 'Recipe\RecipesController@store')->name("media.store");*/
	Route::get('{post}', 'Recipe\MediaController@show')->name("media.show");
});


