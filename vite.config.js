import { defineConfig } from 'vite';
import path from 'path';
import ViteLaravel from 'vite-plugin-laravel'; // Laravel plugin for Vite

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    ViteLaravel({
      input: ['resources/css/app.css', 'resources/js/app.js'], // Configure input files for Vite
      refresh: true, // Automatic refresh on file changes
    }),
  ],
  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'resources/js'), // Alias for JS directory
    },
  },
  server: {
    https: true, // Run the Vite server with HTTPS during development
    host: '0.0.0.0', // Allow access from any IP address
    port: 3000, // Port for the development server
  },
  build: {
    outDir: 'public/build', // Output directory for Laravel build files
    manifest: true, // Enable manifest for Laravel's vite() helper
  },
});
