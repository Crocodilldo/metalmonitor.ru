import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/css/layout.css','resources/css/framework.css',
            'resources/js/jquery.backtotop.js','resources/js/jquery.min.js',
            'resources/js/jquery.mobilemenu.js', 'resources/js/jquery.placeholder.min.js'],
            refresh: true,
        }),
    ],
});
