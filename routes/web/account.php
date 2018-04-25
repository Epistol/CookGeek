<?php
/**
 * Created by PhpStorm.
 * User: mikal
 * Date: 24/04/2018
 * Time: 23:32
 */

Route::get('/home', 'User\HomeController@index')->name("home");

Route::prefix('home')->group(function () {
    Route::get('parameters', 'User\HomeController@parameters')->name("account.param");
    Route::get('data', 'User\HomeController@data')->name("account.data");
    Route::get('fav', 'User\HomeController@fav')->name("account.fav");
    Route::get('recipe', 'User\HomeController@recipe')->name("account.recipe");
});

