<script setup>
import { useMainStore } from "../store/MainStore";
import InputComponent from "./UI/InputComponent.vue";
const mainStore = useMainStore();
</script>

<template>
    <div class="popup">
        <img
            @click="mainStore.changeVisiblePopup"
            class="popup__close"
            src="/public/assets/icons/close.svg"
            alt="close"
        />
        <h2 class="popup__title">Авторизация</h2>
        <div class="popup__item">
            <label for="login"> Введите ваш логин</label>
            <InputComponent
                class="popup__item-input"
                placeholder="Логин"
                name="login"
                type="text"
            />
        </div>
        <div class="popup__item">
            <label for="password"> Введите ваш пароль</label>
            <InputComponent
                class="popup__item-input"
                placeholder="Пароль"
                name="password"
                type="password"
            />
        </div>
        <div class="popup__btns">
            <RouterLink
                class="popup__btns-link"
                to="/"
                @click="mainStore.changeAuth"
            >
                Авторизоваться</RouterLink
            >
            <p class="popup__btns-text">ИЛИ</p>

            <RouterLink
                class="popup__btns-link"
                to="/reg"
                @click="mainStore.changeVisiblePopup"
            >
                Зарегистрироваться</RouterLink
            >
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";

.popup {
    padding-top: 50px;
    position: relative;
    text-align: center;
    background-color: $white;
    width: 100%;
    max-width: 846px;
    max-height: 800px;
    height: 100%;
    border-radius: 30px;
    &__close {
        max-width: 100px;
        width: 100%;
        position: absolute;
        top: 5%;
        right: 5%;
        cursor: pointer;
        @media (max-width: $extraLargeScreen) {
            width: 50%;
        }
        @media (max-width: $tabletScreen) {
            width: 30%;
        }
        @media (max-width: $mobileScreen) {
            width: 15%;
        }
    }
    &__title {
        margin-bottom: 70px;
    }
    &__item {
        @include fontStyle(50px, 400, "Alumni Sans", $dark-brown);

        &-input {
            margin: 0 auto;
        }
    }
    &__btns {
        margin-top: 50px;
        &-link {
            @include buttonStyle;
        }
        &-text {
            margin: 25px 0;
            @include fontStyle(30px, 400, "Alumni Sans", $dark-brown);
        }
    }
}
</style>
