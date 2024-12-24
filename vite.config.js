import { defineConfig } from 'vite';
import laravel from 'vite-plugin-laravel';

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
    }),
  ],
  build: {
    outDir: 'public/build',  // Pastikan output file berada di folder yang benar
    manifest: true,
    rollupOptions: {
      input: {
        app: 'resources/css/app.css',
        js: 'resources/js/app.js',
      },
    },
  },
});
