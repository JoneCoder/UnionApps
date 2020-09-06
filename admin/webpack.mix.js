const mix = require('laravel-mix');

//style css
mix.styles([
    'resources/assets/vendors/styles/style.css'
], 'public/css/style.css');

//QR Scanner js
mix.scripts([
    'node_modules/html5-qrcode/minified/html5-qrcode.min.js',
    'resources/assets/src/scripts/html5-qrcode-inti.js'
], 'public/js/QRscanner.js');

//Mix version
if (mix.inProduction()) {
    mix.version();
}
