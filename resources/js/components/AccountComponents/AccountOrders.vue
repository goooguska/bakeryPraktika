<script setup></script>

<template>
    <div class="orders">
        <p class="orders-text">У вас нет оформленных заказов</p>
    </div>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";
.orders {
    text-align: center;
    &-text {
        margin: 50px auto;
        @include fontStyle(50px, 500, "Alumni Sans", $dark-brown);
    }
}
</style>
