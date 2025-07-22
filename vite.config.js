import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
<<<<<<< HEAD
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
=======
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
    ],
});