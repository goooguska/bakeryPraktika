<script setup>
import FooterTemplate from "./templates/FooterTemplate.vue";
import HeaderTemplate from "./templates/HeaderTemplate.vue";
</script>

<template>
    <div class="container">
        <HeaderTemplate />
        <RouterView class="content" />
        <FooterTemplate />
    </div>
</template>

<style scoped>
.content {
    /* flex: 1 0 auto; */
}
</style>
