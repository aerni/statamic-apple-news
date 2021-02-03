const mix = require('laravel-mix');

mix.setPublicPath('resources/dist')
    .postCss('resources/css/apple-news.css', 'css', [
        require('tailwindcss')
    ])
    .js('resources/js/apple-news.js', 'js').vue();

if (mix.inProduction()) {
    mix.version();
}
