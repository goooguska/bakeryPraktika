<script setup>
import { ref } from "vue";
import { useUserStore } from "../store/UserStore";
const email = ref("");
const userStore = useUserStore();
const sendEmail = () => {
    userStore.sendEmailForResetPassword(email.value);
};
</script>

<template>
    <div class="form__forgot">
        <p class="form__forgot-text">
            Заполните email для отправки письма о сбросе пароля
        </p>
        <input
            class="form__forgot-input"
            type="email"
            placeholder="Введите вашу почту"
            v-model="email"
        />
        <input class="form__forgot-btn" type="submit" @click="sendEmail" />
        <p class="form__forgot-text success">
            {{ userStore.successMessage }}
        </p>
    </div>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";
.form__forgot {
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    gap: 30px;
    &-text {
        text-align: center;
        @include fontStyle(40px, 600, "Alumni Sans", $dark-brown);
    }
    &-input {
        @include inputStyle;
    }
    &-btn {
        @include buttonStyle;
    }
}
.success {
    color: green;
}
</style>
