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

Route::get('/', function () {
	return view('welcome');
})->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name("home");
Route::get('/contact', 'PageController@show_contact');
/*Route::group(['prefix' => 'login'], function () {
	Route::group(['prefix' => 'google'], function () {
		Route::get('','Auth\GoogleController@redirectToProvider');
		Route::get('callback', 'Auth\GoogleController@handleProviderCallback');
	});
	Route::group(['prefix' => 'twitter'], function () {
		Route::get('','Auth\TwitterController@redirectToProvider');
		Route::get('callback', 'Auth\TwitterController@handleProviderCallback');
	});
	Route::group(['prefix' => 'facebook'], function () {
		Route::get('','Auth\FacebookController@redirectToProvider');
		Route::get('callback', 'Auth\FacebookController@handleProviderCallback');
	});

});*/

Route::group(['prefix' => 'recette'], function () {
	Route::get('/','Recipe\RecipesController@index')->name("recipe.index");
	Route::get('ajout','Recipe\RecipesController@add')->name("recipe.add")->middleware('auth');
	Route::get('edit/{post}','Recipe\RecipesController@edit')->name("recipe.edit")->middleware('auth');
	Route::post('ajout','Recipe\RecipesController@store')->name("recipe.store");
	Route::get('{post}','Recipe\RecipesController@show')->name("recipe.show");

    Route::group(['prefix' => 'media'], function () {
        Route::get('/','Recipe\RecipesController@indexmedia')->name("media.index");
        Route::get('ajout','Recipe\RecipesController@add')->name("media.add")->middleware('auth');
        Route::post('ajout','Recipe\RecipesController@store')->name("media.store");
        Route::get('{post}','Recipe\RecipesController@indexmediatype')->name("media.show");
    });

    Route::group(['prefix' => 'type'], function () {
        Route::get('/','Recipe\TypeController@index')->name("type.index");
        Route::get('{post}','Recipe\TypeController@show')->name("type.show");
    });


});



Route::get('search', [    'as' => 'search',    'uses' => 'SearchController@index']);
Route::post('search', [    'as' => 'search',    'uses' => 'SearchController@index']);

Route::group(['prefix' => 'admin'], function () {
	Route::get('/', 'AdminController@index')->middleware('auth', 'admin');
	Route::resource('page', 'PageController');
});

Route::post("/like", 'Api\LikeController@create')->name("api.like.create")->middleware('web');
Route::get("/random", 'Recipe\RecipesController@random')->name("recipe.random");
