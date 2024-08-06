import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
    }),
    vue(),
  ],
  resolve: {
    alias: {
      'vue': 'vue/dist/vue.esm-bundler.js'
    }
  },
  css: {
    postcss: {
      plugins: [
        // Ejemplo de configuración de postcss
      ],
    },
  },
  optimizeDeps: {
    include: [
      // Listar las dependencias que quieres que Vite optimice
    ],
  },
});

