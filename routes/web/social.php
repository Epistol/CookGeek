<?php
/**
 * Created by PhpStorm.
 * User: mikal
 * Date: 24/04/2018
 * Time: 23:27
 */


Auth::routes();


/*Route::group(['prefix' => 'login'], function () {
	Route::group(['prefix' => 'google'], function () {
		Route::get('','Auth\GoogleController@redirectToProvider');
		Route::get('callback', 'Auth\GoogleController@handleProviderCallback');
	});
	Route::group(['prefix' => 'twitter'], function () {
		Route::get('','Auth\TwitterController@redirectToProvider');
		Route::get('callback', 'Auth\TwitterController@handleProviderCallback');
	});
	Route::group(['prefix' => 'facebook'], function () {
		Route::get('','Auth\FacebookController@redirectToProvider');
		Route::get('callback', 'Auth\FacebookController@handleProviderCallback');
	});

});*/
