const mix = require('laravel-mix');

mix.js( 'resources/assets/js/app.js', 'dist/js/app.js')
    .sass( 'resources/assets/scss/app.scss', 'dist/css/app.css')
    .copyDirectory('resources/assets/img', 'dist/img')
    .options({
        processCssUrls: false,
    });

// if (mix.inProduction()) {
//     mix.version();
// }