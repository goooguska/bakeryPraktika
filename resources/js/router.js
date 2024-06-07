import { createRouter, createWebHistory } from "vue-router";
import AccountOrders from "./components/AccountComponents/AccountOrders.vue";
import AccountProfile from "./components/AccountComponents/AccountProfile.vue";
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
    },
    {
        path: "/contacts",
        component: ContactsView,
    },
    {
        path: "/reg",
        component: RegistrationView,
    },
    {
        path: "/gallery",
        component: GalleryView,
    },
    {
        path: "/news",
        component: NewsView,
    },
    {
        path: "/menu",
        component: MenuView,
    },
    {
        path: "/account",
        component: AccountView,
        children: [
            {
                path: "profile",
                component: AccountProfile,
            },

            {
                path: "orders",
                component: AccountOrders,
            },
        ],
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
