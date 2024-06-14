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
    const successMessage = ref("");
    const errorMessage = ref("");

    const sendEmailForResetPassword = async (email) => {
        try {
            await axios.post("/api/forgot-password", {
                email: email.value,
            });
            successMessage.value = "Письмо успешно отправлено!";
        } catch (error) {
            errorMessage.value =
                error.response.data.message || "Что-то пошло не так";
        }
    };

    const resetPassword = async (password, password_confirmation, route) => {
        const res = await axios.post(
            `/api/reset-password/${route.params.token}`,
            {
                email: route.query.email,
                password: password.value,
                password_confirmation: password_confirmation.value,
                token: route.params.token,
            }
        );
        console.log(res);
        router.push({ name: "main" });
    };

    const getToken = () => {
        accesToken.value = localStorage.getItem("access_token");
    };
    const sendEmail = async (email) => {
        try {
            await axios.post("/api/mail", { email: email });
            successMessage.value = " Вы успешно подписались на новости!";
        } catch (error) {
            errorMessage.value =
                error.response.data.message ||
                " Заполните корректно поле email для получения новостей";

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

    const loginUser = async (login, password, recaptcha) => {
        try {
            const response = await axios.post("/api/auth/login", {
                login: login,
                password: password,
                recaptcha: recaptcha,
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
    };

    return {
        loginUser,
        regNewUser,
        getToken,
        logoutUser,
        getInfoAboutUser,
        sendEmail,
        sendEmailForResetPassword,
        resetPassword,
        successMessage,
        errorMessage,
        authUser,
        accesToken,
        errorUser,
    };
});
