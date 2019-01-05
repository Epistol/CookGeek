<?php

Route::group(['prefix' => 'contact'], function () {
	Route::get('/', 'PageController@show_contact')->name("contact.index");
	/*        Route::get('ajout', 'Recipe\RecipesController@add')->name("media.add")->middleware('auth');*/
			Route::post('store', 'PageController@store_contact')->name("contact.store");
});