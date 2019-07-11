const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.options({
    processCssUrls: false
});

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/recipeEdit.js', 'public/js')
    .js('resources/assets/js/load_content.js', 'public/js')
    .js('resources/assets/js/old_app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/admin.scss', 'public/css')
    .sass('resources/assets/sass/print.scss', 'public/css');

mix.copyDirectory('resources/assets/js/toasty', 'public/js/toasty');
mix.copyDirectory('resources/assets/js/lightbox', 'public/js/lightbox');
mix.copyDirectory('resources/assets/js/tarteaucitron', 'public/js/tarteaucitron');

mix.disableNotifications();