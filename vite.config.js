import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    // server: {
    //     cors: true,
    //     host: '0.0.0.0',
    //     port: 5173,
    //     strictPort: true,
    //     hmr: {
    //         host: '10.20.11.224',
    //         port: 5173,
    //     },
    //     proxy: {
    //         '/api': {
    //             target: 'http://10.20.11.224:8008',
    //             changeOrigin: true,
    //         }
    //     }
    // }
});
