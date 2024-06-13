import axios from "axios";
import { defineStore } from "pinia";
import { ref } from "vue";
import api from "../api";
import router from "../router";
import { useMainStore } from "./MainStore";
export const useUserStore = defineStore("userStore", () => {
    const authUser = ref(false);
    const accesToken = ref();
    const errorUser = ref();
    const mainStore = useMainStore();

    const getToken = () => {
        accesToken.value = localStorage.getItem("access_token");
    };
    const sendEmail = async (email) => {
        try {
            await axios.post("/api/mail", { email: email });
            return true;
        } catch (error) {
            console.log(error);
            return false;
        }
    };

    const getInfoAboutUser = async () => {
        try {
            const response = await api.post(
                "/api/auth/me",
                {},
                {
                    headers: {
                        Authorization: `Bearer ${accesToken.value}`,
                    },
                }
            );

            return response.data;
        } catch (error) {
            console.log(error);
        }
    };

    const loginUser = async (login, password) => {
        try {
            const response = await axios.post("/api/auth/login", {
                login: login,
                password: password,
            });
            localStorage.setItem("access_token", response.data.access_token);
            login = "";
            password = "";
            router.push({ name: "main" });
            getToken();
            mainStore.toggleShow();
        } catch (error) {
            errorUser.value = error.response.data.error;
        }
    };

    const regNewUser = async (
        login,
        firstName,
        password,
        password_confirmation,
        email,
        phoneNumber
    ) => {
        try {
            const response = await axios.post("api/users", {
                firstName: firstName,
                login: login,
                password: password,
                email: email,
                password_confirmation: password_confirmation,
                phoneNumber: phoneNumber,
            });
            localStorage.setItem("access_token", response.data.token);
            getToken();
            router.push({ name: "main" });
        } catch (error) {
            errorUser.value = error.response.data.error;
        }
    };
    const logoutUser = async () => {
        try {
            localStorage.removeItem("access_token");
            router.push({ name: "main" });
            getToken();
        } catch (error) {
            console.log(error);
        }
        // await api.post("api/auth/logout");
    };

    return {
        loginUser,
        regNewUser,
        getToken,
        logoutUser,
        getInfoAboutUser,
        sendEmail,
        authUser,
        accesToken,
        errorUser,
    };
});
