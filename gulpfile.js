var elixir = require('laravel-elixir');

// import the dependency
var elixirTypscript = require('elixir-typescript');

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

    mix.browserify([
        'ecmascript/classes/ErrorDisplayer.js',
        'ecmascript/classes/Validation.js',
        'ecmascript/classes/Ajax.js',
        'ecmascript/module/AjaxModule.js',
        'ecmascript/AjaxScript.js'
    ],'resources/assets/js');

    mix.copy('resources/assets/bower/sweetalert/dist/sweetalert.css','resources/assets/css').
        copy('resources/assets/bower/PACE/themes/blue/pace-theme-flash.css','resources/assets/css').
    styles([
        'bootstrap.min.css',
        'font-awesome.min.css',
        'owl.carousel.css',
        'bootstrap-social.css',
        'main.css',
        'custom.css',
        'sweetalert.css',
        'pace-theme-flash.css'
    ]).copy('resources/assets/fonts','public/build/fonts');

    mix.styles([
        'admin/bootstrap.css',
        'admin/font-awesome.min.css',
        'admin/materialadmin.css',
        'admin/material-design-iconic-font.min.css',
        'admin/libs/rickshaw/rickshaw.css',
        'admin/libs/morris/morris.core.css',
    ],'public/adminAssets/css').copy('resources/assets/admin/css/fonts','public/adminAssets/fonts');


    mix.copy('resources/assets/bower/sweetalert/dist/sweetalert.min.js','resources/assets/js')
        .copy('resources/assets/bower/PACE/pace.min.js','resources/assets/js')
        .scripts([
        'vendor/jquery-1.11.3.min.js',
        'vendor/jquery-2.2.2.min.js',
        'bundle.js',
        'vendor/raphael-min.js',
        'bootstrap.min.js',
        'jquery.mixitup.min.js',
        'owl.carousel.min.js',
        'slideOut.js',
        'morris.js',
        'jquery.canvasjs.min.js',
        'plugins.js',
        'main.js',
        'sweetalert.min.js',
        'pace.min.js',
    ]);

    mix.scripts([
            'admin/libs/jquery/jquery-1.11.2.min.js',
            'admin/libs/jquery/jquery-migrate-1.2.1.min.js',
            'admin/libs/bootstrap/bootstrap.min.js',
            'admin/libs/spin.js/spin.min.js',
            'admin/libs/autosize/jquery.autosize.min.js',
            'admin/libs/moment/moment.min.js',
            "admin/libs/flot/jquery.flot.min.js",
            "admin/libs/flot/jquery.flot.time.min.js",
            "admin/libs/flot/jquery.flot.resize.min.js",
            "admin/libs/flot/jquery.flot.orderBars.js",
            "admin/libs/flot/jquery.flot.pie.js",
            "admin/libs/flot/curvedLines.js",
            "admin/libs/jquery-knob/jquery.knob.min.js",
            "admin/libs/sparkline/jquery.sparkline.min.js",
            "admin/libs/nanoscroller/jquery.nanoscroller.min.js",
            "admin/libs/d3/d3.min.js",
            "admin/libs/d3/d3.v3.js",
            "admin/libs/rickshaw/rickshaw.min.js",
            "admin/core/source/App.js",
            "admin/core/source/AppNavigation.js",
            "admin/core/source/AppOffcanvas.js",
            "admin/core/source/AppCard.js",
            "admin/core/source/AppForm.js",
            "admin/core/source/AppNavSearch.js",
            "admin/core/source/AppVendor.js",
            "admin/core/demo/Demo.js",
            "admin/core/demo/DemoDashboard.js"
        ],'public/adminAssets/js');

    mix.copy("resources/assets/img","public/build/img");

    mix.copy("resources/assets/js/admin/libs/utils","public/adminAssets/js");

    mix.version(['css/all.css','js/all.js']);

    mix.phpUnit();

    /**
     *
     * Admin related gulp tasks
     *
     */
});