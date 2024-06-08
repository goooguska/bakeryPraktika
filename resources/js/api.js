import axios from "axios";
import router from "./router";
const api = axios.create();
// start request
if (localStorage.getItem("access_token")) {
    api.interceptors.request.use(
        (config) => {
            config.headers = {
                authorization: `Bearer ${localStorage.getItem("access_token")}`,
            };
            return config;
        },
        (error) => {
            console.log(error);
        }
    );
}

// end request

// start response
if (localStorage.getItem("access_token")) {
    api.interceptors.response.use(
        (config) => {
            config.headers = {
                authorization: `Bearer ${localStorage.getItem("access_token")}`,
            };
            return config;
        },
        (error) => {
            if (error.response.status === 401) {
                router.push({ name: "main" });
            }
        }
    );
}

// end response
export default api;
