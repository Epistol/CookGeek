<?php
/**
 * Created by PhpStorm.
 * User: mikal
 * Date: 24/04/2018
 * Time: 23:27
 */


    Route::group(['prefix' => 'admin'], function () {

	    Voyager::routes();
	    Route::get('ban', 'Admin\AdminController@ban')->name("admin.ban.index");
	    Route::post('/ban/submit', 'Admin\AdminController@bansubmit');

	    // USERS
        Route::get('user', 'Admin\GestionUtil@index')->name("admin.user.index");
        Route::get('user/edit/{id}', 'Admin\GestionUtil@edit')->name("admin.user.edit");
        // RECIPES
        Route::get('recipes', 'Admin\RecipesAdmin@index')->name("admin.recipe.index");
        Route::get('recipes/edit/{id}', 'Admin\RecipesAdmin@edit')->name("admin.recipe.edit");
        // PAGES
        Route::resource('page', 'PageController');


    });
