const mix = require('laravel-mix');

//styles css
mix.styles([
    'resources/assets/vendors/styles/core.css',
    'resources/assets/vendors/styles/icon-font.min.css',
    'resources/assets/vendors/styles/custom.css'
], 'public/css/app.css',);

//datatables css
mix.styles([
    'resources/assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css'
], 'public/css/datatables.css',);

//switchery css
mix.styles([
    'resources/assets/src/plugins/switchery/switchery.min.css',
], 'public/css/switchery.css',);

//fonts css
mix.styles([
    'resources/assets/vendors/styles/style.css'
], 'public/css/style.css',);

//main js
mix.scripts([
    'resources/assets/vendors/scripts/core.js',
    'resources/assets/vendors/scripts/script.min.js',
    'resources/assets/vendors/scripts/process.js',
    'resources/assets/vendors/scripts/layout-settings.js',
    'resources/assets/vendors/scripts/footer.js'
], 'public/js/app.js');

//QR Scanner js
mix.scripts([
    'node_modules/html5-qrcode/minified/html5-qrcode.min.js',
    'resources/assets/src/scripts/html5-qrcode-inti.js'
], 'public/js/QRscanner.js');

//Charts js
mix.scripts([
    'resources/assets/src/plugins/apexcharts/apexcharts.min.js',
    'resources/assets/vendors/scripts/apexcharts-setting.js'
], 'public/js/chart.js');

//switch js
mix.scripts([
    'resources/assets/src/plugins/switchery/switchery.min.js'
], 'public/js/switchery.js');

//datatables js
mix.scripts([
    'resources/assets/src/plugins/datatables/js/jquery.dataTables.min.js',
    'resources/assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js',
    'resources/assets/src/plugins/datatables/js/dataTables.responsive.min.js',
    'resources/assets/src/plugins/datatables/js/responsive.bootstrap4.min.js',
    'resources/assets/src/plugins/datatables/js/dataTables.buttons.min.js',
    'resources/assets/src/plugins/datatables/js/buttons.bootstrap4.min.js',
    'resources/assets/src/plugins/datatables/js/buttons.print.min.js',
    'resources/assets/src/plugins/datatables/js/buttons.html5.min.js',
    'resources/assets/src/plugins/datatables/js/buttons.flash.min.js',
    'resources/assets/src/plugins/datatables/js/pdfmake.min.js',
    'resources/assets/src/plugins/datatables/js/vfs_fonts.js'
], 'public/js/datatables.js');

//Mix version
if (mix.inProduction()) {
    mix.version();
}
