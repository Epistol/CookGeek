<?php
/**
 * Created by PhpStorm.
 * User: mikal
 * Date: 24/04/2018
 * Time: 23:25.
 */

use Illuminate\Support\Facades\Route;


Route::get('/cgu', 'PageController@show_cgu')->name('page.cgu')->middleware('cacheResponse:2');
Route::get('/shop', 'PageController@show_shop')->name('page.shop')->middleware('cacheResponse:2');
Route::get('/confid', 'PageController@show_confidentiality')->name('page.conf')->middleware('cacheResponse:2');

Route::group(['prefix' => 'contact'], function () {
    Route::get('/', 'PageController@show_contact')->name('contact.index');
    /*        Route::get('ajout', 'Recipe\RecipeController@add')->name("media.add")->middleware('auth');*/
    Route::post('store', 'PageController@store_contact')->name('contact.store');
});
