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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.styles([
    'resources/css/style-my.css',
], 'public/css/style-my.css');

mix.styles([
    'resources/css/style-auth.css',
], 'public/css/style-auth.css');

mix.copy('resources/plugins', 'public/plugins');
mix.copy('resources/dist', 'public/dist');

mix.copy('resources/images', 'public/images');
//mix.copy('resources/fonts', 'public/fonts');
