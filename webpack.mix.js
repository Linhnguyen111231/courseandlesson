const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .js('Modules/Skills/resources/assets/js/app.js', 'public/js/assets/skills')
    .js('Modules/Courses/resources/assets/js/app.js', 'public/js/assets/admin/courses')
    .js('Modules/Lessons/resources/assets/js/app.js', 'public/js/assets/admin/lessons')
    .postCss('Modules/Dashboard/resources/assets/css/app.css', 'public/css/assets/dashboard.css', [
        require('tailwindcss'),
    ])
    .postCss('Modules/Home/resources/assets/css/app.css', 'public/css/assets/home.css', [
        require('tailwindcss'),
    ])
    .postCss('Modules/Courses/resources/assets/css/app.css', 'public/css/assets/courses.css', [
        require('tailwindcss'),
    ])
    .postCss('resources/css/app.css', 'public/css/app.css', [
        require('tailwindcss'),
    ])
    .vue();
    // .sass('resources/sass/app.scss', 'public/css');
