import { createRouter, createWebHistory } from "vue-router";
import AccountView from "./Views/AccountView.vue";
import ContactsView from "./Views/ContactsView.vue";
import GalleryView from "./Views/GalleryView.vue";
import MainView from "./Views/MainView.vue";
import RegistrationView from "./Views/RegistrationView.vue";
import AccountOrders from "./components/AccountComponents/AccountOrders.vue";
import AccountProfile from "./components/AccountComponents/AccountProfile.vue";

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
