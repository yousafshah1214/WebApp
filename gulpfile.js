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
        'admin/font-awesome.min.css',
        'admin/bootstrap.css',
        'admin/style.css',
        'admin/responsive.css',
        'admin/shortcuts.css',
        'admin/plugin/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css',
        'admin/plugin/bootstrap-select/bootstrap-select.css',
        'admin/plugin/bootstrap-toggle/bootstrap-toggle.min.css',
        'admin/plugin/bootstrap-wysihtml5/bootstrap-wysihtml5.css',
        'admin/plugin/summernote/summernote.css',
        'admin/plugin/summernote/summernote-bs3.css',
        'admin/plugin/sweet-alert/sweet-alert.css',
        'admin/plugin/datatables/datatables.css',
        'admin/plugin/chartist/chartist.min.css',
        'admin/plugin/rickshaw/rickshaw.css',
        'admin/plugin/rickshaw/detail.css',
        'admin/plugin/rickshaw/graph.css',
        'admin/plugin/rickshaw/legend.css',
        'admin/plugin/date-range-picker/daterangepicker-bs3.css',
        'admin/plugin/fullcalendar/fullcalendar.css',
    ],'public/adminAssets/css').copy('resources/assets/css/admin/fonts','public/build/AdminAssets/fonts');

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
            'admin/jquery.min.js',
            'admin/bootstrap/bootstrap.min.js',
            'admin/plugins.js',
            'admin/bootstrap-select/bootstrap-select.js',
            'admin/bootstrap-toggle/bootstrap-toggle.min.js',
            'admin/bootstrap-wysihtml5/wysihtml5-0.3.0.min.js',
            "admin/bootstrap-wysihtml5/bootstrap-wysihtml5.js",
            "admin/summernote/summernote.min.js",
            "admin/flot-chart/flot-chart.js",
            "admin/flot-chart/flot-chart-time.js",
            "admin/flot-chart/flot-chart-stack.js",
            "admin/flot-chart/flot-chart-pie.js",
            "admin/flot-chart/flot-chart-plugin.js",
            "admin/chartist/chartist.js",
            "admin/chartist/chartist-plugin.js",
            "admin/easypiechart/easypiechart.js",
            "admin/easypiechart/easypiechart-plugin.js",
            "admin/sparkline/sparkline.js",
            "admin/sparkline/sparkline-plugin.js",
            "admin/rickshaw/d3.v3.js",
            "admin/rickshaw/rickshaw.js",
            "admin/rickshaw/rickshaw-plugin.js",
            "admin/datatables/datatables.min.js",
            "admin/sweet-alert/sweet-alert.min.js",
            "admin/kode-alert/main.js",
            "admin/gmaps/gmaps.js",
            "admin/gmaps/gmaps-plugin.js",
            "admin/jquery-ui/jquery-ui.min.js",
            "admin/moment/moment.min.js",
            "admin/full-calendar/fullcalendar.js",
            "admin/date-range-picker/daterangepicker.js"
        ],'public/adminAssets/js');

    mix.copy("resources/assets/img","public/build/img");

    mix.copy("resources/assets/img/admin","public/build/adminAssets/img");

    mix.version(['css/all.css','js/all.js','adminAssets/js/all.js','adminAssets/css/all.css']);

    //mix.phpUnit();

    /**
     *
     * Admin related gulp tasks
     *
     */
});