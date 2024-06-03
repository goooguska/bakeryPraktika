<script setup>
import { useMainStore } from "../../store/MainStore";
import CardContact from "../CardContact.vue";
const mainStore = useMainStore();
</script>

<template>
    <div class="contacts">
        <h2 class="contacts-title">Контакты</h2>
        <ul class="contacts__list">
            <li
                class="contacts__list-item"
                v-for="restaurant in mainStore.restaurants"
            >
                <CardContact :restaurant />
            </li>
        </ul>
    </div>
</template>

<style lang="scss" scoped>
.contacts {
    &__list {
        margin-top: 86px;
        display: flex;
        justify-content: space-between;
        margin-bottom: 100px;
    }
}
</style>
