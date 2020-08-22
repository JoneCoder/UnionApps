const mix = require('laravel-mix');

//styles css
mix.styles([
    'node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css',
    'node_modules/datatables.net-buttons-bs4/css/buttons.bootstrap4.css',
    'resources/assets/vendors/styles/core.css',
    'resources/assets/vendors/styles/icon-font.min.css'
], 'public/css/app.css');

//styles css
mix.styles([
    'resources/assets/vendors/styles/style.css'
], 'public/css/style.css');

//main js
mix.scripts([
    'resources/assets/vendors/scripts/core.js',
    'resources/assets/vendors/scripts/script.min.js',
    'resources/assets/vendors/scripts/process.js',
    'resources/assets/vendors/scripts/layout-settings.js',
    'resources/assets/vendors/scripts/footer.js',
    'node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js',
    'node_modules/datatables.net-buttons-bs4/js/buttons.bootstrap4.js'
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
