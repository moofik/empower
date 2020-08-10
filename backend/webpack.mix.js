require('laravel-mix-alias');
require('laravel-mix-tailwind');
//require('laravel-mix-bundle-analyzer');
const mix = require('laravel-mix');

// if (mix.isWatching()) {
//     mix.bundleAnalyzer();
// }

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .tailwind();

mix.alias({
    '@': '/resources/js',
    '~': '/resources'
});

mix.copyDirectory('resources/images', 'public/images');
mix.copyDirectory('resources/fonts', 'public/fonts');

mix.sourceMaps();
