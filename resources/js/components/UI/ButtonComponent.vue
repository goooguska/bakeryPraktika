<script setup></script>

<template>
    <div class="button">
        <slot />
    </div>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";

.button {
    @include buttonStyle;
}
</style>
