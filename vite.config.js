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
build: {
    outDir: 'public/build',
    emptyOutDir: true,
    manifest: true,
    rollupOptions: {
      input: ['resources/js/app.js', 'resources/css/app.css'],
    },
  },  
server: {
    host: '0.0.0.0',
    allowedHosts: ['bioloska-putovnica.xyz'],
    hmr: {
      host: 'bioloska-putovnica.xyz',
      protocol: 'wss',
      path: '/vite',
      port: 443
    },
    origin: 'https://bioloska-putovnica.xyz/vite'
  },
});

