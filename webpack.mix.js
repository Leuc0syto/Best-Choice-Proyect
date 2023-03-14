const mix = require('laravel-mix');



mix.js('resourse/js/app.js', 'public/js')
.sass('resources/sass/app.scss', 'public/css');

