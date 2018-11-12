<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function(Request $request) {
	return $request->user();
});

Route::post('/search', [
	'as' => 'api.search',
	'uses' => 'Api\SearchController@search'
]);

Route::post("like/check_liked/", 'Api\LikeController@check_liked')->name("api.like.check");
Route::post("like/toggle_like/", 'Api\LikeController@toggle_like')->name("api.like.toggle");

Route::get("/autocomplete/search/univers", 'Api\SearchController@search_univers')->name("api.search.univers");

