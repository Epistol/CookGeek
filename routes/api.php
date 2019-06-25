<?php
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

Route::post('/search', [
    'as'   => 'api.search',
    'uses' => 'Api\SearchController@search',
]);

require base_path('routes/api/user.php');
require base_path('routes/api/recipe/recipe.php');
require base_path('routes/api/recipe/step.php');
require base_path('routes/api/recipe/type.php');

//EN SURSIS :

Route::post('/recipe/get_picture/', 'Api\RecipeController@get_picture')->name('api.recipe.get_picture');
Route::post('/universe/addmypicture', 'PictureController@addPictureToUniverse')->name('api.universe.picture.store');

Route::get('/autocomplete/search', 'Api\SearchController@search_univers')->name('api.search.univers');
Route::get('/autocomplete/search/univers', 'Api\SearchController@search_univers')->name('api.search.univers');
