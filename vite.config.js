import vue from "@vitejs/plugin-vue";
import laravel from "laravel-vite-plugin";
import { defineConfig } from "vite";
export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: [
                "resources/css/main.scss",
                "resources/js/app.js",
                // "/public/assets",
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            vue: "vue/dist/vue.esm-bundler.js",
        },
    },
    server: {
        static: {
            directory: "/public",
        },
    },
});
