<script setup>
defineProps({
    restaurant: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <div class="card">
        <p class="card-title info">
            {{ restaurant.name }}
        </p>
        <p class="card-street info">
            {{ restaurant.street }}
        </p>
        <p class="card-phone info">Телефон: {{ restaurant.phoneNumber }}</p>
        <p class="card-email info">Почта: {{ restaurant.email }}</p>
    </div>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";

.card {
}
.info {
    @include fontStyle(50px, 400, "Alumni Sans", $dark-brown);
}
</style>
