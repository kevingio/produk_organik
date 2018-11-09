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

mix.js([
    'resources/assets/js/app.js',
    'public/js/image-preview.js',
    'public/js/main.js',
    'public/js/viewportchecker.js',
], 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .styles([
       'public/css/animate.css',
       'public/css/master.css',
    ], 'public/css/all.css')
    .styles('public/css/image-preview.css', 'public/css/instagram.css')
    .js('public/js/home.js', 'public/js/instagram.js');
