<?php
/**
 * Created by PhpStorm.
 * User: mikal
 * Date: 24/04/2018
 * Time: 23:25
 */


Route::get('/cgu', 'PageController@show_cgu')->name("page.cgu")->middleware('cacheResponse:2');

Route::group(['prefix' => 'contact'], function() {
	Route::get('/', 'PageController@show_contact')->name("contact.index");
	/*        Route::get('ajout', 'Recipe\RecipesController@add')->name("media.add")->middleware('auth');*/
	Route::post('store', 'PageController@store_contact')->name("contact.store");
});
