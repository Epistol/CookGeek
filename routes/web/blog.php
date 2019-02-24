<?php
/**
 * Created by PhpStorm.
 * User: mikal
 * Date: 24/04/2018
 * Time: 23:25.
 */
Route::group(['prefix' => 'blog'], function () {
//    Route::get('/', 'PostController@index');

    Route::middleware(['admin'])->group(function () {
        Route::get('/create', 'PostController@admin_create')->name('blog.add');
    });
});
