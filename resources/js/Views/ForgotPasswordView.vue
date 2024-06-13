<script setup>
import axios from "axios";
import { ref } from "vue";

const email = ref("");
const sendEmailForResetPassword = () => {
    console.log(email.value);
    const response = axios.post("/guest/forgot-password");
};
</script>

<template>
    <div>
        <h1>Я забыл пароль</h1>
        <input type="email" placeholder="почта" v-model="email" />
    </div>
</template>

<style lang="scss" scoped></style>
