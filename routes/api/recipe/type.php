<?php

Route::post('/type/mediaTypes/', 'Api\TypeController@getMediasTypes')->name('api.type.media');
Route::post('/universe/mediaTypes/', 'Api\UniversController@getMediasTypes')->name('api.universe.media');


