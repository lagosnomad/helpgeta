/*require('dotenv').config();*/

let mix = require('laravel-mix');

mix.sass('resources/assets/sass/app.scss', 'public/assets/public/css').options({
    processCssUrls: false
});

mix.js('resources/assets/js/app.js', 'public/assets/public/js').webpackConfig({
    resolve: {
        alias: {
            '@': path.resolve('resources/assets/sass')
        }
    }
});

mix.copy('resources/assets/css/linear-icons.css', 'public/assets/public/css/linear-icons.css');

mix.copy('resources/assets/fonts', 'public/assets/public/fonts');

mix.browserSync({
    proxy: 'helpgeta.test',
    files: [
        'public/assets/public/css/{*,**!/!*}.css',
        'resources/views/modules/**/*.php',
        'resources/assets/js/components/**/*.vue',
        'Modules/**/Resources/css/views/*.php',
    ]
});

mix.options({
    extractVueStyles: 'public/assets/public/css/components.css'
});
