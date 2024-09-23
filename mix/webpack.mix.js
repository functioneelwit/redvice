const mix = require('laravel-mix');
const fs = require('fs');

const banner = fs.readFileSync('banner.txt', 'utf8');

mix.sass('sass/styles.sass', '../style.css')
    .setPublicPath('../')
    .then(() => {
        const compiledCss = fs.readFileSync('../style.css', 'utf8');
        fs.writeFileSync('../style.css', banner + '\n' + compiledCss);
    });