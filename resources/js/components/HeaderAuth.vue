<script setup>
import { onMounted, onUpdated } from "vue";
import { useMainStore } from "../store/MainStore";
import { useUserStore } from "../store/UserStore";
import PopupAuth from "./PopupAuth.vue";
const userStore = useUserStore();
const mainStore = useMainStore();
onMounted(() => {
    userStore.getToken();
});
onUpdated(() => {
    userStore.getToken();
});
</script>

<template>
    <div v-if="userStore.accesToken" class="auth">
        <div class="auth__cart">
            <img src="/assets/icons/cart.svg" alt="cart" />
            <p class="auth__cart-text">КОРЗИНА</p>
        </div>
        <div class="auth__account">
            <img src="/assets/icons/account.svg" alt="account" />

            <RouterLink class="auth__account-link" to="/account/profile">
                ЛИЧНЫЙ КАБИНЕТ
            </RouterLink>
        </div>
    </div>
    <div v-else class="nonauth">
        <button class="nonauth-link" @click="mainStore.toggleShow">
            ВОЙТИ
        </button>

        <RouterLink class="nonauth-link" to="/reg"> РЕГИСТРАЦИЯ</RouterLink>
    </div>
    <div v-show="mainStore.showAuth" class="card">
        <PopupAuth />
    </div>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";

.auth {
    display: flex;
    align-items: center;
    gap: 45px;
    @media (max-width: $mobileScreen) {
        justify-content: center;
    }
    &__cart {
        display: flex;
        align-items: center;
        gap: 10%;
        @media (max-width: $mobileScreen) {
            max-width: 42px;
            width: 100%;
            img {
                width: 60%;
            }
        }

        &-text {
            cursor: pointer;
            @include fontStyle(30px, 400, "Alumni Sans", $dark-brown);
            @include underlineLink;
        }
    }
    &__account {
        display: flex;
        align-items: center;
        gap: 15px;

        @media (max-width: $mobileScreen) {
            max-width: 85px;
            width: 100%;
            img {
                width: 10%;
            }
        }
        &-link {
            @include fontStyle(30px, 400, "Alumni Sans", $dark-brown);
            @include underlineLink;
        }
    }
}
.nonauth {
    display: flex;
    justify-content: center;
    gap: 15px;
    &-link {
        @include buttonStyle;
    }
}
.card {
    z-index: 5;
    width: 100%;
    position: fixed;
    inset: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: rgba(0, 0, 0, 0.3);
    cursor: default;
}
</style>
