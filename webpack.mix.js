const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .combine(['resources/assets/js/script.js','resources/assets/js/user_register.js','resources/assets/js/code_generator.js','resources/assets/js/profile.js'],'public/js/script.js')
   .combine(['resources/assets/js/dashboard.js'],'public/js/dashboard.js')
   .version();
