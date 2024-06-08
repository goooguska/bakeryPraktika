import { createRouter, createWebHistory } from "vue-router";
import AccountOrders from "./components/AccountComponents/AccountOrders.vue";
import AccountProfile from "./components/AccountComponents/AccountProfile.vue";
import NotFound from "./components/NotFound.vue";
import AccountView from "./Views/AccountView.vue";
import ContactsView from "./Views/ContactsView.vue";
import GalleryView from "./Views/GalleryView.vue";
import MainView from "./Views/MainView.vue";
import MenuView from "./Views/MenuView.vue";
import NewsView from "./Views/NewsView.vue";
import RegistrationView from "./Views/RegistrationView.vue";

const routes = [
    {
        path: "/",
        component: MainView,
        name: "main",
    },
    {
        path: "/contacts",
        component: ContactsView,
        name: "contacts",
    },
    {
        path: "/reg",
        component: RegistrationView,
        name: "registration",
    },
    {
        path: "/gallery",
        component: GalleryView,
        name: "gallery",
    },
    {
        path: "/news",
        component: NewsView,
        name: "news",
    },
    {
        path: "/menu",
        component: MenuView,
        name: "menu",
    },
    {
        path: "/account",
        component: AccountView,
        name: "account",

        children: [
            {
                path: "profile",
                component: AccountProfile,
                name: "profile",
            },

            {
                path: "orders",
                component: AccountOrders,
                name: "orders",
            },
        ],
    },
    {
        path: "/:catchAll(.*)",
        component: NotFound,
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
