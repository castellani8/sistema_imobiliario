const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

mix
.sass('resources/views/admin/assets/scss/reset.scss', 'public/backend/assets/css/reset.css')
.sass('resources/views/admin/assets/scss/boot.scss', 'public/backend/assets/css/boot.css')
.sass('resources/views/admin/assets/scss/login.scss', 'public/backend/assets/css/login.css')

.js('resources/views/admin/assets/js/jquery.min.js', 'resources/views/admin/assets/js/jquery.js')
.js('resources/views/admin/assets/js/login.js', 'resources/views/admin/assets/js/login.js')

.copyDirectory('resources/views/admin/assets/css/fonts', 'public/backend/assets/css/fonts')

.copyDirectory('resources/views/admin/assets/images', 'public/backend/assets/images')


.options({
    processCssUrls: false
})

.version()
;

