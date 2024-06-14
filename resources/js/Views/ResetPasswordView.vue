<script setup>
import { ref } from "vue";
import { useRoute } from "vue-router";
import { useUserStore } from "../store/UserStore";
const password = ref("");
const password_confirmation = ref("");
const route = useRoute();
const userStore = useUserStore();

const resetUserPassword = () => {
    userStore.resetPassword(password, password_confirmation, route);
};
</script>

<template>
    <div class="form__reset">
        <input
            class="form__reset-input"
            type="text"
            placeholder="Введите ваш новый пароль"
            v-model="password"
        />
        <input
            class="form__reset-input"
            type="text"
            placeholder="Подтвердите пароль"
            v-model="password_confirmation"
        />

        <input
            class="form__reset-btn"
            @click="resetUserPassword"
            type="submit"
            value="Сбросить пароль"
        />
        <p class="form__reset-text success">
            {{ userStore.successMessage }}
        </p>
    </div>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";
.success {
    color: green;
}
.form__reset {
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    gap: 20px;
    &-text {
        text-align: center;
        @include fontStyle(40px, 600, "Alumni Sans", $dark-brown);
    }
    &-input {
        color: $dark-brown;
        @include inputStyle;
    }
    &-btn {
        @include buttonStyle;
    }
}
</style>
