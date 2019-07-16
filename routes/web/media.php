<?php

use Illuminate\Support\Facades\Route;

// RECETTE/MEDIA
Route::group(['prefix' => 'media'], function () {
    Route::get('/', 'MediaController@index')->name('media.index');
    Route::get('{post}', 'MediaController@show')->name('media.show');
});
