const mix = require('laravel-mix');
const ESLintPlugin = require('eslint-webpack-plugin');

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

mix
    // Scripts
    .js('resources/js/app.js', 'public/js')

    // Styles
    .sass('resources/sass/app.scss', 'public/css')
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss')
    ])

    // General Config
    .vue()

    // ESLint
    .webpackConfig({
        plugins: [new ESLintPlugin()]
    })
;
