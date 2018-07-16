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

mix.js(['node_modules/jquery/src/jquery.js','node_modules/bootstrap/dist/js/bootstrap.js'], 'public/js/main.js')
   .styles(['node_modules/bootstrap/dist/css/bootstrap.css','public/css/custom.css'], 'public/css/main.css');
