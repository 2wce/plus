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

elixir.config.sourcemaps = false;

elixir(function(mix) {

	mix.styles([
        '../bower/bootstrap/dist/css/bootstrap.css',
        '../bower/plus-custom/dist/css/styles.css'
    ], 'public/assets/css/vendor.css');

	mix.scripts([
    	'../bower/jquery/dist/jquery.js',
    	'../bower/bootstrap/dist/js/bootstrap.js',
    	'../bower/jquery-ui/jquery-ui.js',						
		'../bower/velocity/velocity.js',
		'../bower/velocity/velocity.ui.js',
		'../bower/plus-custom/dist/js/application.js'
	], 'public/assets/js/vendor.js');    
});

