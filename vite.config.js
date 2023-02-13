import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import eslintPlugin from "vite-plugin-eslint";

export default defineConfig({
    plugins: [
        eslintPlugin(),
        laravel({
            input: 'resources/js/app.ts',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    server: {
        hmr: {
            host: 'localhost'    // Fix CORS issue when serving via Vite locally
        }
    },
});
