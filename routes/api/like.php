<?php
Route::prefix('like')->group(function () {
Route::post('/', 'Api\LikeController@create')->name('api.like.create');
Route::get('/check_liked', 'Api\LikeController@check_liked')->name('api.like.check');
Route::post('/check_liked', 'Api\LikeController@check_liked')->name('api.like.check');
Route::get('/toggle_like', 'Api\LikeController@toggle_like')->name('api.like.toggle');
Route::post('/nblike', 'Api\LikeController@nbLike')->name('api.like.nb');
Route::post('/toggle_like', 'Api\LikeController@toggle_like')->name('api.like.toggle');
});