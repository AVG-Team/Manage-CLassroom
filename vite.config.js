import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import {viteStaticCopy} from "vite-plugin-static-copy";

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/auth.js', 'resources/js/profile.js', 'resources/css/app.css' , 'resources/js/admin/app.js'],
            refresh: true,
        }),
    ],
});
