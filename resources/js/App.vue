<script setup>
import FooterTemplate from "./layouts/FooterTemplate.vue";
import HeaderTemplate from "./layouts/HeaderTemplate.vue";
</script>

<template>
    <div class="container">
        <HeaderTemplate />
        <RouterView />
        <FooterTemplate />
    </div>
</template>

<style scoped></style>
