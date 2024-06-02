import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("./Views/MainView.vue"),
    },
    {},
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
