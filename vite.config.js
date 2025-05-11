import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: 'localhost',
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/footer.css',
                'resources/css/header.css',
                'resources/css/root.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
