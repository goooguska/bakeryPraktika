<script setup></script>

<template>
    <div class="profile">
        <p class="profile-text">Пользователь</p>
        <p class="profile-text">Ваш логин: Krutoy</p>
        <p class="profile-text">Ваше имя: Кот</p>
        <RouterLink class="profile-link" to="/">Выйти </RouterLink>
    </div>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";

.profile {
    &-text {
        @include fontStyle(50px, 500, "Alumni Sans", $dark-brown);
    }
    &-text:nth-child(3) {
        margin-bottom: 60px;
    }
    &-link {
        @include buttonStyle;
    }
}
</style>
