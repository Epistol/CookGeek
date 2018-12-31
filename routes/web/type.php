<?php

Route::group(['prefix' => 'type'], function () {
	Route::get('/', 'TypeController@index')->name("type.index");
	Route::get('{post}', 'TypeController@show')->name("type.show");
});
