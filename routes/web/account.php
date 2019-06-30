<?php

use Illuminate\Support\Facades\Route;


/**
 * Created by PhpStorm.
 * User: mikal
 * Date: 24/04/2018
 * Time: 23:32.
 */

Route::prefix('home')->middleware('forbid-banned-user')->group(function () {
    Route::get('/', 'User\HomeController@index')->name('home');
    Route::post('parameters', 'User\HomeController@paramStore')->name('param.store');
    Route::get('parameters', 'User\HomeController@parameters')->name('account.param');
    Route::get('favorites', 'User\HomeController@favorites')->name('account.fav');
    Route::get('recipes', 'User\HomeController@recipes')->name('account.recipe');
    Route::get('data', 'User\HomeController@data')->name('account.data');
    Route::get('password', 'User\HomeController@password')->name('account.password');
    Route::post('password', 'User\HomeController@paramStore')->name('account.password.change');
});

Route::prefix('user')->group(function () {
    Route::get('/', 'User\UserController@index')->name('user.index');
    Route::get('{post}', 'User\UserController@show')->name('user.show');
});
