const mix = require('laravel-mix');

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
 mix.webpackConfig({
     resolve: {
      alias: {
          "TweenLite": path.resolve('node_modules', 'gsap/src/uncompressed/TweenLite.js'),
          "TweenMax": path.resolve('node_modules', 'gsap/src/uncompressed/TweenMax.js'),
          "TimelineLite": path.resolve('node_modules', 'gsap/src/uncompressed/TimelineLite.js'),
          "TimelineMax": path.resolve('node_modules', 'gsap/src/uncompressed/TimelineMax.js'),
          "ScrollMagic": path.resolve('node_modules', 'scrollmagic/scrollmagic/uncompressed/ScrollMagic.js'),
          "animation.gsap": path.resolve('node_modules', 'scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap.js'),
          "debug.addIndicators": path.resolve('node_modules', 'scrollmagic/scrollmagic/uncompressed/plugins/debug.addIndicators.js'),
          "ScrollToPlugin": path.resolve('node_modules', 'gsap/src/uncompressed/plugins/ScrollToPlugin.js'),
          "ImageMap": path.resolve('node_modules', 'image-map/dist/image-map.js')
      },
    },
 })
mix.js([
        'resources/assets/js/app.js',
        'resources/assets/js/map.js',
    ], 'public/js/app.js')
    .js('resources/assets/js/vue-admin/schools.js', 'public/js/admin/school.js')
    .js('resources/assets/js/admin-app.js', 'public/js/admin-app.js')
    .sass('resources/assets/sass/be_app.scss', 'public/css')
    .sass('resources/assets/sass/admin.scss', 'public/css');
