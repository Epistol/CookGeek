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

require base_path('routes/api/like.php');


Route::post('/user/getName', 'Api\UserController@nameReturn')->name('api.user.name');

Route::post('/recipe/get_steps/', 'Api\RecipeController@get_steps')->name('api.recipe.get_steps');
Route::post('/recipe/get_ingredients/', 'Api\RecipeController@get_ingredients')->name('api.recipe.get_ingredients');

Route::post('/recipe/alerte/', 'Api\RecipeController@alerte')->name('api.recipe.alerte');


Route::get('/note', function () {
    return redirect('/');
})->name('api.like.checknote');

Route::post('/note', 'Api\NoteController@checknote')->name('api.like.checknote');

Route::get('/difficulty', 'Api\RecipeController@getDifficulties')->name('api.difficulty');
Route::get('/category', 'Api\RecipeController@getCategories')->name('api.category');


//EN SURSIS :

Route::post('/recipe/get_picture/', 'Api\RecipeController@get_picture')->name('api.recipe.get_picture');
Route::post('/universe/addmypicture', 'PictureController@addPictureToUniverse')->name('api.universe.picture.store');

Route::get('/autocomplete/search', 'Api\SearchController@search_univers')->name('api.search.univers');
Route::get('/autocomplete/search/univers', 'Api\SearchController@search_univers')->name('api.search.univers');
