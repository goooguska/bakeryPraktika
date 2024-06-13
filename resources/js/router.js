import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("./Views/MainView.vue"),
        name: "main",
    },
    {
        path: "/contacts",
        component: () => import("./Views/ContactsView.vue"),
        name: "contacts",
    },
    {
        path: "/reg",
        component: () => import("./Views/RegistrationView.vue"),

        name: "registration",
    },
    {
        path: "/gallery",
        component: () => import("./Views/GalleryView.vue"),

        name: "gallery",
    },
    {
        path: "/news",
        component: () => import("./Views/NewsView.vue"),

        name: "news",
    },
    {
        path: "/menu",
        component: () => import("./Views/MenuView.vue"),

        name: "menu",
    },
    {
        path: "/api/forgot-password",
        component: () => import("./Views/ForgotPasswordView.vue"),

        name: "forgot-password",
    },
    {
        path: "/api/reset-password/:token",
        component: () => import("./Views/ResetPasswordView.vue"),

        name: "reset-password",
    },
    {
        path: "/account",
        component: () => import("./Views/AccountView.vue"),

        name: "account",

        children: [
            {
                path: "profile",
                component: () =>
                    import("./components/AccountComponents/AccountProfile.vue"),
                name: "profile",
            },

            {
                path: "orders",
                component: () =>
                    import("./components/AccountComponents/AccountOrders.vue"),

                name: "orders",
            },
        ],
    },
    {
        path: "/:catchAll(.*)",
        component: () => import("./components/NotFound.vue"),

        name: "NotFound",
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    const token = localStorage.getItem("access_token");
    if (token) {
        if (to.name === "registration") {
            return next({
                name: "main",
            });
        }
    } else {
        if (to.name === "profile" || to.name === "orders") {
            return next({
                name: "main",
            });
        }
    }

    next();
});

export default router;
