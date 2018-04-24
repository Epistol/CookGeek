<?php
/**
 * Created by PhpStorm.
 * User: mikal
 * Date: 24/04/2018
 * Time: 23:27
 */

Route::middleware(['role:admin, doNotCacheResponse'])->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        // OVERVIEW
        Route::get('/', 'Admin\AdminController@index')->name("admin.index");
        // USERS
        Route::get('user', 'Admin\GestionUtil@index')->name("admin.user.index");
        Route::get('user/edit/{id}', 'Admin\GestionUtil@edit')->name("admin.user.edit");
        // RECIPES
        Route::get('recipes', 'Admin\RecipesAdmin@index')->name("admin.recipe.index");
        Route::get('recipes/edit/{id}', 'Admin\RecipesAdmin@edit')->name("admin.recipe.edit");
        // PAGES
        Route::resource('page', 'PageController');
    });
});
