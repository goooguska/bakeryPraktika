<script setup>
import HeaderAuth from "../components/HeaderAuth.vue";
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
        <HeaderAuth />
    </header>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";

.header {
    @include flexAndCenter;
    padding-top: 60px;
    padding-bottom: 60px;
    @media (max-width: $tabletScreen) {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        grid-template-rows: 1fr, 100px, 100px;
        text-align: center;
        justify-content: center;
        gap: 15px;
    }
    &__logo {
        max-width: 101px;
        width: 20%;
        @media (max-width: $tabletScreen) {
            margin: 0 auto;
        }
    }
    &__logo img {
        width: 100%;
    }

    &__nav {
        &-list {
            @include flexAndCenter;
            gap: 85px;
            @media (max-width: $laptopScreen) {
                gap: 25px;
            }

            &-item {
                @include underlineLink;

                @include fontStyle(30px, 500, "Alumni Sans", $dark-brown);
            }
        }
    }
}
</style>
