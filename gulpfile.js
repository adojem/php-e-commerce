var elixir = require('laravel-elixir');
var gulp = require('gulp');

elixir.config.sourcemaps = false;

elixir(function(mix) {
   // compile sass to css
   mix.sass('resources/assets/sass/app.scss', 'resources/assets/css');
   // combine css file
   mix.styles(
      ['css/app.css', 'bower/vendor/slic-carousel/slick/slick.css'],
      'public/css/all.css', // output file
      'resources/assets'
   );

   var bowerPath = 'bower/vendor';
   mix.scripts([
      // jQuery
      bowerPath + '/jquery/dist/jquery.min.js',
      // foundation js
      bowerPath + '/foundation-sites/dist/js/foundation.min.js',
      // other dependencies
      bowerPath + '/slick-carousel/slick/slick.min.js'
   ], 'public/js/all.js', 'resources/assets');
});
