<script setup>
import FooterTemplate from "./templates/FooterTemplate.vue";
import HeaderTemplate from "./templates/HeaderTemplate.vue";
</script>

<template>
    <div class="container">
        <HeaderTemplate />
        <RouterView />
        <FooterTemplate />
    </div>
</template>

<style scoped></style>
