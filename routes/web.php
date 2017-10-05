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

Route::get('/home', 'HomeController@index');
Route::get('/contact', 'PageController@show_contact');
Route::group(['prefix' => 'login'], function () {
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

});

Route::group(['prefix' => 'recette'], function () {
	Route::get('','Recipe\RecipesController@show');
	Route::get('ajout','Recipe\RecipesController@add');
});

Route::group(['prefix' => 'admin'], function () {
	Route::get('/', 'AdminController@index')->middleware('auth', 'admin');
	Route::resource('page', 'PageController');


});
