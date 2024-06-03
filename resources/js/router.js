import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("./Views/MainView.vue"),
    },
    {
        path: "/contacts",
        component: () => import("./Views/ContactsView.vue"),
    },
    {
        path: "/reg",
        component: () => import("./Views/RegistrationView.vue"),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
