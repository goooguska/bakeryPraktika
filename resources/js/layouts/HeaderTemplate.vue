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
            <img
                class="header__logo-img"
                src="/public/assets/icons/main-logo.svg"
                alt="logo"
            />
        </div>
        <!-- <p v-if="response">{{ response.data }}</p> -->
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
            <ButtonComponent @click.prevent="getReg()">
                <RouterLink class="header__auth-btns-link" to="reg">
                    РЕГИСТРАЦИЯ</RouterLink
                >
            </ButtonComponent>
        </div>
    </header>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";

.header {
    @media (max-width: $tabletScreen) {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        grid-template-rows: 1fr, 100px, 100px;
        text-align: center;
        justify-content: center;
        gap: 15px;
    }
    @include flexAndCenter;
    padding: 60px;
    &__logo {
        &-img {
            @media (max-width: $mobileScreen) {
                // width: 50px;
            }
        }
    }
    &__nav {
        &-list {
            @include flexAndCenter;
            gap: 85px;
            @media (max-width: $laptopScreen) {
                gap: 25px;
            }

            &-item {
                @include fontStyle(30px, 500, "Alumni Sans", $dark-brown);
            }
        }
    }
    &__auth-btns {
        justify-content: center;

        display: flex;
        gap: 15px;
        &-link {
            color: $light-brown;
        }
    }
}
</style>
