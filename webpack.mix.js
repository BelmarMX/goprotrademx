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

mix.webpackConfig({
        stats: {
            children: false
        }
    })
    .js('resources/js/app.js', 'public/v1/js')
    .js('resources/js/cms.js', 'public/v1/js')
    .sass('resources/sass/app.scss', 'public/v1/css')
    .sass('resources/sass/cms.scss', 'public/v1/css')
    .sass('resources/sass/embed.scss', 'public/v1/css')
    .sass('resources/sass/swal2.scss', 'public/v1/css')
    .sass('resources/sass/swal2-admin.scss', 'public/v1/css')
