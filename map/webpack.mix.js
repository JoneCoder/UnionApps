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

//styles css
mix.styles([
    'resources/assets/vendors/styles/core.css',
    'resources/assets/vendors/styles/style.css'
], 'public/css/app.css',);

//fonts css
mix.styles([
    'resources/assets/vendors/styles/icon-font.min.css',
], 'public/css/icon-font.css',);

//main js
mix.scripts([
    'resources/assets/vendors/scripts/core.js',
    'resources/assets/vendors/scripts/script.min.js',
    'resources/assets/vendors/scripts/process.js',
    'resources/assets/vendors/scripts/layout-settings.js'
], 'public/js/app.js');

//Charts js
mix.scripts([
    'resources/assets/src/plugins/apexcharts/apexcharts.min.js',
    'resources/assets/vendors/scripts/apexcharts-setting.js'
], 'public/js/chart.js');

//Mix version
if (mix.inProduction()) {
    mix.version();
}
