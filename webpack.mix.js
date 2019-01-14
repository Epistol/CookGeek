let mix = require('laravel-mix');

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


mix.js('resources/assets/js/app.js', 'public/js').js('resources/assets/js/load_content.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css').sass('resources/assets/sass/print.scss', 'public/css');

mix.copyDirectory('resources/assets/js/toasty', 'public/js/toasty');
mix.copyDirectory('resources/assets/js/tarteaucitron', 'public/js/tarteaucitron');

    // .js('node_modules/lightbox2/src/js/lightbox.js', 'public/js').css('node_modules/lightbox2/src/css/lightbox.css', 'public/css');



