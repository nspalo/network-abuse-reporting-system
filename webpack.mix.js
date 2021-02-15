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

mix
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/common/auto-scale-container.js', 'public/js/common')
    // .js('resources/js/common/bootstrap-form-validator.js', 'public/js/common')
    .js('resources/js/abuse-report/create.js', 'public/js/abuse-report')
    .sass('resources/sass/style.scss', 'public/css')
;
