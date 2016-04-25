var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.copy('resources/assets/bower/sweetalert/dist/sweetalert.css','resources/assets/css').
    styles([
        'bootstrap.min.css',
        'font-awesome.min.css',
        'owl.carousel.css',
        'bootstrap-social.css',
        'main.css',
        'custom.css',
        'sweetalert.css'
    ]).copy('resources/assets/fonts','public/build/fonts');

    mix.copy('resources/assets/bower/sweetalert/dist/sweetalert.min.js','resources/assets/js').scripts([
        'vendor/jquery-1.11.3.min.js',
        'vendor/jquery-2.2.2.min.js',
        'vendor/raphael-min.js',
        'bootstrap.min.js',
        'jquery.mixitup.min.js',
        'owl.carousel.min.js',
        'slideOut.js',
        'morris.js',
        'jquery.canvasjs.min.js',
        'plugins.js',
        'main.js',
        'sweetalert.min.js'
    ]);
    mix.copy("resources/assets/img","public/build/img");

    mix.version(['css/all.css','js/all.js']);
});