<?php
/**
 * Created by PhpStorm.
 * User: mikal
 * Date: 24/04/2018
 * Time: 23:32
 */

Route::get('/home', 'User\HomeController@index')->name("home");

Route::prefix('home')->group(function () {
    Route::post('parameters', 'User\HomeController@param_store')->name("param.store");
    Route::get('parameters', 'User\HomeController@parameters')->name("account.param");

    Route::get('fav', 'User\HomeController@fav')->name("account.fav");
    Route::get('recipe', 'User\HomeController@recipe')->name("account.recipe");

});

