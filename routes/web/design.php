<?php
/**
 * Created by PhpStorm.
 * User: mikal
 * Date: 24/04/2018
 * Time: 23:27
 */

Route::middleware(['role:admin, doNotCacheResponse'])->group(function () {
    Route::group(['prefix' => 'design'], function () {
        // OVERVIEW
        Route::get('/', 'DesignController@index')->name("design.index");

    });
});
