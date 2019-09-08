<?php


    Route::get('/teapot', function () {
        abort(418);
    })->name('teapot');

    Route::middleware(['forbid-banned-user'])->group(function () {
        require base_path('routes/web/account.php');
    });

    // RECIPES
    require base_path('routes/web/recipe.php');
    require base_path('routes/web/type.php');
    require base_path('routes/web/media.php');
    require base_path('routes/web/pages.php');
    require base_path('routes/web/universe.php');
    require base_path('routes/web/like.php');
    require base_path('routes/web/blog.php');
    require base_path('routes/web/ingredient.php');
    require base_path('routes/web/social.php');

    // RECHERCHE
    Route::get('search', ['as' => 'search', 'uses' => 'SearchController@index']);
    Route::post('search', ['as' => 'search.post', 'uses' => 'SearchController@index']);

    // RSS
    Route::feeds();

    /// API
//    Route::post('/like', 'Api\LikeController@create')->name('api.like.create');
    Route::get('/', 'PageController@accueil')->name('index');

    require base_path('routes/web/admin.php');

    Route::get('/cookies', 'PageController@cookie')->name('cookie');

    Route::get('/sitemap', function () {
        return response(file_get_contents(public_path('sitemap.xml')), 200, [
            'Content-Type' => 'application/xml',
        ]);
    })->name('sitemap');

    Route::get('/blog', function () {
        return redirect('/');
    });
