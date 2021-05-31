const mix = require('laravel-mix');

mix.setPublicPath('resources/dist')
    .js('resources/js/apple-news.js', 'js').vue();
    // .postCss('resources/css/apple-news.css', 'css', [
    //     require('tailwindcss')
    // ])

if (mix.inProduction()) {
    mix.version();
}
