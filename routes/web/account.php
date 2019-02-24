<?php
/**
 * Created by PhpStorm.
 * User: mikal
 * Date: 24/04/2018
 * Time: 23:32.
 */
Route::get('/home', 'User\HomeController@index')->name('home');

Route::prefix('home')->middleware('forbid-banned-user')->group(function () {
    Route::post('parameters', 'User\HomeController@param_store')->name('param.store');
    Route::get('parameters', 'User\HomeController@parameters')->name('account.param');

    Route::get('favorites', 'User\HomeController@favorites')->name('account.fav');
    Route::get('recipes', 'User\HomeController@recipes')->name('account.recipe');
});

Route::prefix('user')->group(function () {
    Route::get('/', 'User\UserController@index')->name('user.index');
    Route::get('{post}', 'User\UserController@show')->name('user.show');
});
