var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('app.less', 'resources/css');

    mix.styles([
    	'app.css',
    	'select2.min.css',
        'font-awesome.css',
        'hover-min.css',
        'bootstrap-datetimepicker.css',
        'awesome-bootstrap-checkbox.css',
    	'style.css'
    ]);

    mix.scripts([
    	'jquery-2.1.3.min.js',
    	'select2.min.js',
    	'bootstrap.js',
        'moment.js',
        'bootstrap-datetimepicker.js',
        'tinymce.min.js',
        'pwstrength.js',
        'validator.js'
    ])

    mix.version(['css/all.css', 'js/all.js']);
});