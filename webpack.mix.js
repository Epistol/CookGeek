let mix = require('laravel-mix');
require('mix-tailwindcss');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/recipeEdit.js', 'public/js')
    .js('resources/assets/js/old_app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/admin.scss', 'public/css')
    .sass('resources/assets/sass/print.scss', 'public/css')
    .copyDirectory('resources/assets/js/toasty', 'public/js/toasty')
    .copyDirectory('resources/assets/js/lightbox', 'public/js/lightbox')
    .copyDirectory('resources/assets/js/tarteaucitron', 'public/js/tarteaucitron')
    .options({
       processCssUrls: false
    })
    .tailwind('./tailwind.config.js');

mix.disableNotifications();


mix.babelConfig({
    plugins: ['@babel/plugin-syntax-dynamic-import'],
});
