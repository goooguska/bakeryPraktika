<script setup>
import axios from "axios";
import { ref } from "vue";
import ButtonComponent from "../components/UI/ButtonComponent.vue";

const response = ref();
const getAuth = async () => {
    try {
        response.value = await axios.get("/api/auth");
    } catch (error) {
        console.log(error);
    }
};
const getReg = async () => {
    try {
        response.value = await axios.get("/api/reg");
    } catch (error) {
        console.log(error);
    }
};
</script>

<template>
    <header class="header">
        <div class="header__logo">
            <img src="/assets/icons/main-logo.svg" alt="logo" />
        </div>
        <nav class="header__nav">
            <ul class="header__nav-list">
                <RouterLink class="header__nav-list-item" to="/"
                    >ГЛАВНАЯ
                </RouterLink>
                <RouterLink class="header__nav-list-item" to="/news"
                    >НОВОСТИ
                </RouterLink>
                <RouterLink class="header__nav-list-item" to="/menu"
                    >МЕНЮ
                </RouterLink>
                <RouterLink class="header__nav-list-item" to="/gallery"
                    >ГАЛЕРЕЯ
                </RouterLink>
                <RouterLink class="header__nav-list-item" to="/contacts"
                    >КОНТАКТЫ
                </RouterLink>
            </ul>
        </nav>
        <div class="header__auth-btns">
            <ButtonComponent @click.prevent="getAuth()">ВОЙТИ </ButtonComponent>
            <ButtonComponent @click.prevent="getReg()"
                >РЕГИСТРАЦИЯ
            </ButtonComponent>
        </div>
    </header>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";

.header {
    @include flexAndCenter;
    padding: 60px;
    &__nav {
        &-list {
            @include flexAndCenter;
            gap: 85px;
            &-item {
                @include fontStyle(30px, 500, "Alumni Sans", $dark-brown);
            }
        }
    }
    &__auth-btns {
        display: flex;
        gap: 15px;
    }
}
</style>
