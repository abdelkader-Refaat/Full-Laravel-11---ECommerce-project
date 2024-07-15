import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from 'tailwindcss';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/tailwind.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    css: {
        postcss: {
            plugins: [tailwindcss],
        },
    },
});
