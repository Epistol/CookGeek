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

Route::post("/like/check_liked/", 'Api\LikeController@check_liked')->name("api.like.check");
Route::post("/like/toggle_like/", 'Api\LikeController@toggle_like')->name("api.like.toggle");


Route::post("/recipe/get_picture/", 'Api\RecipeController@get_picture')->name("api.recipe.get_picture");
Route::post("/recipe/get_ingredients/", 'Api\RecipeController@get_ingredients')->name("api.recipe.get_ingredients");
Route::post("/recipe/get_steps/", 'Api\RecipeController@get_steps')->name("api.recipe.get_steps");
Route::post("/recipe/alerte/", 'Api\RecipeController@alerte')->name("api.recipe.alerte");

Route::get("/autocomplete/search/univers", 'Api\SearchController@search_univers')->name("api.search.univers");

Route::post("/like", 'Api\LikeController@create')->name("api.like.create");
Route::post("/note", 'Api\NoteController@checknote')->name("api.like.checknote");