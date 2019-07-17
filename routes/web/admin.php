<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/', 'Admin\AdminController@index')->name('admin.index');
        // BAN
        Route::get('ban', 'Admin\AdminController@ban')->name('admin.ban.index');
        Route::post('/validatePicture', 'Admin\RecipesAdmin@validatePicture')
            ->name('admin.recipe.picture.validate');
        Route::get('/{id}/ban_user', 'Admin\GestionUtil@ban_user')->name('admin.ban.create');
        Route::post('/ban/submit', 'Admin\GestionUtil@ban_user_store')->name('admin.ban.store');
        // UNBAN
        Route::get('/{id}/unban', 'Admin\GestionUtil@unban_user')->name('admin.unban.create');
        Route::post('/unban/submit', 'Admin\GestionUtil@unban_user_store')->name('admin.unban.store');

        Route::resource('user', 'Admin\GestionUtil', ['as' => 'admin']);
        Route::resource('universe', 'Admin\UniverseController', ['as' => 'admin']);
        Route::resource('recipe', 'Admin\RecipesAdmin', ['as' => 'admin']);
        Route::resource('ingredient', 'Admin\IngredientController', ['as' => 'admin']);
        Route::post('ingredient/deletedup', 'Admin\IngredientController@deleteDuplicates')
            ->name('admin.ingredient.deletedup');
        Route::resource('page', 'PageController', ['as' => 'admin']);
        // Ingredients
        Route::get('ingredients', 'Admin\IngredientController@index');
        Route::group(['prefix' => 'blog'], function () {
            Route::get('create', 'PostController@create')
                ->name('admin.blog.add');
        });
    });
});
