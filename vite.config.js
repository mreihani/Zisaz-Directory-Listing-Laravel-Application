import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',

                // Frontend, master page, preloading css file
                'resources/css/frontend/master/page-loading-styles.css',
                'resources/css/frontend/master/jaban-custom-styles.css',

                // Frontend, master page, preloading js file
                'resources/js/frontend/master/page-loading-scripts.js',

                // Frontend, master page, login and registraion modals scripts
                'resources/js/frontend/master/auth-modals-scripts.js',
            ],
            refresh: true,
        }),
    ],
});

