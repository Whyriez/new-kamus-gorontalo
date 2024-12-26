import { defineConfig } from 'vite';
import path from 'path';
import ViteLaravel from 'vite-plugin-laravel'; // Laravel plugin for Vite

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    ViteLaravel({
        input: ['resources/css/app.css', 'resources/js/app.js'],
        refresh: true,
    }),
],
});
