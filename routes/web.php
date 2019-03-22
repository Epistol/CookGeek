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

Route::middleware(['fw-block-blacklisted'])->group(function () {

    Route::get('/teapot', function () {
        abort(418);
    })->name('teapot');

    require base_path('routes/web/social.php');
    Route::middleware(['forbid-banned-user'])->group(function () {
        require base_path('routes/web/account.php');
    });

    require base_path('routes/web/universe.php');

    // RECIPES
    require base_path('routes/web/recipe.php');
    require base_path('routes/web/type.php');
    require base_path('routes/web/media.php');
    require base_path('routes/web/pages.php');
    require base_path('routes/web/blog.php');
    require base_path('routes/web/ingredient.php');
    // RECHERCHE
    Route::get('search', ['as' => 'search', 'uses' => 'SearchController@index']);
    Route::post('search', ['as' => 'search.post', 'uses' => 'SearchController@index']);

    // RSS
    Route::feeds();

    //ADMIN
    require base_path('routes/web/design.php');

    //require base_path('routes/web/admin.php');

    /// API
    Route::post('/like', 'Api\LikeController@create')->name('api.like.create');
    Route::get('/random', 'Recipe\RecipeController@random')->name('recipe.random');

    Route::get('/', 'PageController@accueil')->name('index');

    require base_path('routes/web/admin.php');

    Route::get('/cookies', 'PageController@cookie')->name('cookie');

    Route::get('/sitemap', function () {
        return response(file_get_contents(public_path('sitemap.xml')), 200, [
            'Content-Type' => 'application/xml',
        ]);
    })->name('sitemap');
});
