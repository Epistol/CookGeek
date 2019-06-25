<?php

use Illuminate\Support\Facades\Route;


Route::prefix('like')->group(function () {
    Route::post('/', 'LikeController@create')->name('api.like.create');
    Route::get('/checkLikedRecipe', 'LikeController@checkLikedRecipe')->name('api.like.check');
    Route::post('/checkLikedRecipe', 'LikeController@checkLikedRecipe')->name('api.like.check');
    Route::get('/toggleLikeRecipe', 'LikeController@toggleLikeRecipe')->name('api.like.toggle');
    Route::post('/nbLikeRecipe', 'LikeController@nbLikeRecipe')->name('api.like.nb');
    Route::post('/toggleLikeRecipe', 'LikeController@toggleLikeRecipe')->name('api.like.toggle');
});