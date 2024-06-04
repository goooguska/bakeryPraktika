<script setup></script>

<template>
    <div class="account">
        <div class="account__list">
            <h1>Личный кабинет</h1>

            <RouterLink class="account__list-link" to="/account/profile"
                >Профиль</RouterLink
            >

            <RouterLink class="account__list-link" to="/account/orders"
                >История заказов</RouterLink
            >
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";

.account {
    &__list {
        display: flex;
        align-items: center;
        gap: 70px;
        &-link {
            @include underlineLink;
            @include fontStyle(50px, 500, "Alumni Sans", $dark-brown);
        }
    }
}
</style>
