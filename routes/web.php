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

// Parce que
Route::get('/teapot', function () {
    abort(418);
})->name('teapot');

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

// RECETTE
Route::group(['prefix' => 'recette'], function () {
    Route::get('/','Recipe\RecipesController@index')->name("recipe.index")->middleware('cacheResponse:2');
    Route::get('ajout','Recipe\RecipesController@add')->name("recipe.add")->middleware('auth');
    Route::get('edit/{post}','Recipe\RecipesController@edit')->name("recipe.edit")->middleware('auth');
    Route::post('ajout','Recipe\RecipesController@store')->name("recipe.store");

    Route::group(['prefix' => 'type'], function () {
        Route::get('/','TypeController@index')->name("type.index");
      Route::get('{post}','TypeController@show')->name("type.show");
    });

// RECETTE/MEDIA
    Route::group(['prefix' => 'media'], function () {
        Route::get('/','Recipe\RecipesController@indexmedia')->name("media.index");
        Route::get('ajout','Recipe\RecipesController@add')->name("media.add")->middleware('auth');
        Route::post('ajout','Recipe\RecipesController@store')->name("media.store");
        Route::get('{post}','Recipe\RecipesController@indexmediatype')->name("media.show");
    });

    Route::get('{post}','Recipe\RecipesController@show')->name("recipe.show")->middleware('cacheResponse:10');



//RECETTE/TYPE

});



// RECHERCHE
Route::get('search', [    'as' => 'search',    'uses' => 'SearchController@index']);
Route::post('search', [    'as' => 'search',    'uses' => 'SearchController@index']);

// RSS

Route::feeds();

//ADMIN
Route::middleware(['role:admin, doNotCacheResponse'])->group(function () {
    Route::group(['prefix' => 'admin'], function(){
        // OVERVIEW
        Route::get('/', 'Admin\AdminController@index')->name("admin.index");
        // USERS
        Route::get('user', 'Admin\GestionUtil@index')->name("admin.user.index");
        Route::get('user/edit/{id}', 'Admin\GestionUtil@edit')->name("admin.user.edit");
        // RECIPES
        Route::get('recipes', 'Admin\RecipesAdmin@index')->name("admin.recipe.index");
        Route::get('recipes/edit/{id}', 'Admin\RecipesAdmin@edit')->name("admin.recipe.edit");
        // PAGES
        Route::resource('page', 'PageController');
    });
});


/// API
Route::post("/like", 'Api\LikeController@create')->name("api.like.create")->middleware('web');
Route::post("/note", 'Api\NoteController@create')->name("api.like.create")->middleware('web');
Route::get("/random", 'Recipe\RecipesController@random')->name("recipe.random");

