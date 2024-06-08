import axios from "axios";
import { defineStore } from "pinia";
import { ref } from "vue";
import api from "../api";
import router from "../router";
export const useUserStore = defineStore("userStore", () => {
    const authUser = ref(false);
    const accesToken = ref();
    const errorUser = ref();
    const getToken = () => {
        accesToken.value = localStorage.getItem("access_token");
    };
    const getInfoAboutUser = async () => {
        const response = await api.post("/api/auth/login");
        console.log(response);
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
            router.push({ name: "main" });
            console.log(response);
        } catch (error) {
            errorUser.value = error.response.data.error;
        }
    };
    const logoutUser = async () => {
        const response = await api.post("api/auth/logout");
        console.log(response);
        localStorage.removeItem("access_token");
        router.push({ name: "main" });
    };

    return {
        loginUser,
        regNewUser,
        getToken,
        logoutUser,
        getInfoAboutUser,
        authUser,
        accesToken,
        errorUser,
    };
});
