<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Parce que
Route::get('/teapot',function (){abort(418);})->name('teapot');

require base_path('routes/web/social.php');
require base_path('routes/web/account.php');
	
	Route::get('/design', 'DesignController@index')->name("design.index");


Route::get('/contact', 'PageController@show_contact');


// RECIPES
require base_path('routes/web/recipe.php');


// RECHERCHE
Route::get('search', ['as' => 'search', 'uses' => 'SearchController@index']);
Route::post('search', ['as' => 'search', 'uses' => 'SearchController@index']);

// RSS
Route::feeds();


//ADMIN
require base_path('routes/web/design.php');

require base_path('routes/web/admin.php');

/// API
Route::post("/like", 'Api\LikeController@create')->name("api.like.create")->middleware('web');
Route::post("/note", 'Api\NoteController@create')->name("api.like.create")->middleware('web');
Route::get("/random", 'Recipe\RecipesController@random')->name("recipe.random");

Route::get('/','PageController@accueil')->name('index');
