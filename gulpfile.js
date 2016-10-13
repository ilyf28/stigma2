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
    mix.copy('public/bower_components/foundation/scss', 'resources/assets/sass');
    mix.sass(['app.scss']);
    mix.version('public/css/app.css') ; 
    //mix.task('webpack-dev-server');
}); 
