<?php
    /**
     * Created by PhpStorm.
     * User: mikal
     * Date: 24/04/2018
     * Time: 23:27.
     */
    Route::group(['prefix' => 'design'], function () {
        Route::get('', 'DesignController@index')->name('design.index');
    });
