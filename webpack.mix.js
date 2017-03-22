const { mix } = require('laravel-mix');

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
mix.copy('resources/assets/fonts', 'public/build/fonts');

mix.js('resources/assets/js/app.js', 'public/build/js')
   .sass('resources/assets/sass/app.scss', 'public/build/css');

mix.js('node_modules/sweetalert/dist/sweetalert-dev.js', 'public/build/js/resources.js')
   .styles('node_modules/sweetalert/dist/sweetalert.css', 'public/build/css/resources.css');

mix.js('node_modules/dropzone/dist/dropzone.js', 'public/build/js/dropzone.js')
   .styles('node_modules/dropzone/dist/dropzone.css', 'public/build/css/dropzone.css');

mix.js('resources/assets/js/backend.js', 'public/build/js/backend.js');

mix.styles([
    'resources/assets/css/sidebar.css',
    'resources/assets/css/font-awesome.css',
    'resources/assets/css/backend.css',
], 'public/build/css/backend.css');

if (mix.config.inProduction) {
    mix.version();
}
