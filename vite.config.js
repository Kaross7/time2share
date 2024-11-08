import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',    
                'resources/js/app.js',      
                'resources/css/begin.css', 
                'resources/js/login_register.js',
                'resources/js/main.js'             
            ],
            refresh: true,
        }),
    ],
});
