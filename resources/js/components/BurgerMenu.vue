<script setup>
import { useMainStore } from "../store/MainStore";

const mainStore = useMainStore();
</script>

<template>
    <div :class="{ open: !mainStore.isOpen }" class="burger__menu">
        <span class="burger__menu-line"></span>
        <span class="burger__menu-line"></span>
        <span class="burger__menu-line"></span>
    </div>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";
.burger__menu {
    display: none;
    @media (max-width: $smallLaptopScreen) {
        z-index: 5;
        display: block;
        position: relative;
        right: 5%;

        &-line {
            background-color: $dark-brown;
            height: 3px;
            width: 30px;
            position: absolute;

            &:nth-child(1) {
                margin-bottom: 5px;
                top: 5px;
            }
            &:nth-child(3) {
                margin-top: 5px;
            }
        }
    }

    &.open {
        .burger__menu-line:nth-child(1) {
            top: 8px;
            transform: rotate(-45deg);
        }
        .burger__menu-line:nth-child(2) {
            opacity: 0;
        }
        .burger__menu-line:nth-child(3) {
            top: -8px;
            transform: rotate(45deg);
        }
    }

    &:not(.open) {
        .burger__menu-line:nth-child(1) {
            transform: translateY(-5px);
        }
        .burger__menu-line:nth-child(2) {
            display: block;
        }
        .burger__menu-line:nth-child(3) {
            transform: translateY(0px);
        }
    }

    &-line {
        background-color: $dark-brown;
        height: 3px;
        width: 30px;
        position: relative;
        display: block;
        margin: 5px auto;
        transition: all 0.3s ease;
    }
}
</style>
