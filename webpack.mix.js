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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
    'public/css/libs/blog-post.css',
    'public/css/libs/bootstrap.css',
    'public/css/libs/font-awesome.css',
    'public/css/libs/metisMenu.css',
    'public/css/libs/sb-admin-2.css',
    'public/css/libs/styles.css',
], 'public/css/libs.css');

mix.js([
    'public/js/libs/bootstrap.js',
    'public/js/libs/jquery.js',
    'public/js/libs/metisMenu.js',
    'public/js/libs/sb-admin-2.js',
    'public/js/libs/scripts.js',
],'public/js/libs.js');