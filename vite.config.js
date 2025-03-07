import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'

export default defineConfig({
    css: {
        postcss: {
            plugins: [require('tailwindcss')(), require('autoprefixer')()],
        },
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        hmr: {
            host: 'localhost',
            protocol: 'ws',
        },
    },
})
