<script setup>
import BurgerMenu from "../components/BurgerMenu.vue";
import HeaderAuth from "../components/HeaderAuth.vue";
import { useMainStore } from "../store/MainStore";
const mainStore = useMainStore();
const recaptchaKey = window.recaptchaKey;
console.log(recaptchaKey);
</script>

<template>
    <header class="header">
        <div class="header__logo">
            <img
                class="header__logo-img"
                src="/assets/icons/main-logo.svg"
                alt="logo"
            />
        </div>

        <div class="g-recaptcha" :data-sitekey="recaptchaKey"></div>
        <nav :class="{ navBar: mainStore.isOpen }" class="header__nav">
            <ul class="header__nav-list">
                <RouterLink
                    @click="mainStore.toggleBurgerMenu"
                    class="header__nav-list-item"
                    to="/"
                    >ГЛАВНАЯ
                </RouterLink>
                <RouterLink
                    @click="mainStore.toggleBurgerMenu"
                    class="header__nav-list-item"
                    to="/news"
                    >НОВОСТИ
                </RouterLink>
                <RouterLink
                    @click="mainStore.toggleBurgerMenu"
                    class="header__nav-list-item"
                    to="/menu"
                    >МЕНЮ
                </RouterLink>
                <RouterLink
                    @click="mainStore.toggleBurgerMenu"
                    class="header__nav-list-item"
                    to="/gallery"
                    >ГАЛЕРЕЯ
                </RouterLink>
                <RouterLink
                    @click="mainStore.toggleBurgerMenu"
                    class="header__nav-list-item"
                    to="/contacts"
                    >КОНТАКТЫ
                </RouterLink>
            </ul>

            <HeaderAuth />
        </nav>
        <BurgerMenu @click="mainStore.toggleBurgerMenu" />
    </header>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";

.navBar {
    @media (max-width: $smallLaptopScreen) {
        display: none;
    }
}

.header {
    @include flexAndCenter;
    padding-top: 60px;
    padding-bottom: 60px;
    @media (max-width: $smallLaptopScreen) {
        z-index: 5;
        padding-top: 20px;
        padding-bottom: 20px;
        display: flex;
    }

    &__logo {
        z-index: 5;

        max-width: 101px;
        width: 20%;
    }
    &__logo img {
        width: 100%;
    }

    &__nav {
        gap: 100px;
        @media (min-width: 869px) {
            display: flex;
        }
        @media (max-width: $XXLargeScreen) {
            gap: 30px;
        }
        @media (max-width: $smallLaptopScreen) {
            background-color: rgba(0, 0, 0, 0.3);
            position: fixed;
            height: 100%;
            z-index: 4;
            left: 0;
            right: 0;
            top: 0;
            transition: all 0.3s ease;
            padding-top: 10%;
            text-align: center;
        }
        &-list {
            @include flexAndCenter;
            gap: 85px;

            @media (max-width: $laptopScreen) {
                gap: 25px;
            }
            @media (max-width: $smallLaptopScreen) {
                display: flex;
                flex-direction: column;
                gap: 0;
            }

            &-item {
                @include underlineLink;

                @include fontStyle(30px, 500, "Alumni Sans", $dark-brown);
                @media (max-width: $smallLaptopScreen) {
                    color: $light-brown;
                    font-size: 30px;
                }
            }
        }
    }
}
</style>
