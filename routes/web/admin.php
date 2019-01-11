<?php
/**
 * Created by PhpStorm.
 * User: mikal
 * Date: 24/04/2018
 * Time: 23:27
 */


Route::group(['prefix' => 'admin'], function() {

	Route::get('/', 'Admin\AdminController@index');

	// BAN
	Route::get('ban', 'Admin\AdminController@ban')->name("admin.ban.index");
	Route::get('/{id}/ban_user', 'Admin\GestionUtil@ban_user')->name("admin.ban.create");
	Route::post('/ban/submit', 'Admin\GestionUtil@ban_user_store')->name("admin.ban.store");
	// UNBAN
	Route::get('/{id}/unban', 'Admin\GestionUtil@unban_user')->name("admin.unban.create");
	Route::post('/unban/submit', 'Admin\GestionUtil@unban_user_store')->name("admin.unban.store");
	// USERS
	Route::resource('user', 'Admin\GestionUtil', ['as' => 'admin']);
	// RECIPES
	Route::resource('recipe', 'Admin\RecipesAdmin', ['as' => 'admin']);
	// PAGES
	Route::resource('page', 'PageController');
});

Route::group(['prefix' => 'voyager'], function() {

	Voyager::routes();

});

