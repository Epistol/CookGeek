<?php
use Illuminate\Support\Facades\Route;

// /UNIVERSE
    Route::group(['prefix' => 'univers'], function () {
        Route::get('/', 'UniversController@index')->name('univers.index');
        Route::get('ajout', 'UniversController@add')->name('univers.add')->middleware('auth');
        Route::post('ajout', 'UniversController@store')->name('univers.store');
        Route::get('{post}', 'UniversController@show')->name('univers.show');
    });
