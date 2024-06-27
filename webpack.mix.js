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

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);


mix
    .sass('resources/views/scss/style.scss','public/site/css/style.css')
    .scripts('node_modules/jquery/dist/jquery.js','public/site/js/jquery.js')
    .scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js','public/site/js/bootstrap.bundle.js')

    .styles([
        'resources/views/site/css/style.css'
    ], 'public/site/css/navbar.css')
    .styles([
        'resources/views/site/css/login.css'
    ], 'public/site/css/login.css')

    .styles([
        'resources/views/site/css/upload.css'
    ], 'public/site/css/upload.css')

    .styles([
        'resources/views/site/css/profile.css'
    ], 'public/site/css/profile.css')

    .styles([
        'resources/views/site/css/hire.css'
    ], 'public/site/css/hire.css')

    .styles([
        'resources/views/site/css/rents.css'
    ], 'public/site/css/rents.css')


    .scripts([
        'resources/views/site/js/script.js'
    ], 'public/site/js/script.js')

    .scripts([
        'resources/views/site/js/upload.js'
    ], 'public/site/js/upload.js')

    .scripts([
        'resources/views/site/js/payment.js'
    ], 'public/site/js/payment.js')

     .scripts([
        'resources/views/site/js/cep.js'
    ], 'public/site/js/cep.js')

    .styles([
        'resources/views/site/css/nav.css'
    ], 'public/site/css/nav.css')


    .version();
