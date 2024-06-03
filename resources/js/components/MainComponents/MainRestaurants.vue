<script setup>
import { useMainStore } from "../../store/MainStore";
import CardRestaurant from "../CardRestaurant.vue";
const mainStore = useMainStore();
</script>

<template>
    <div class="restaurants">
        <div class="restaurants__content">
            <ul class="restaurants__content-list">
                <li
                    class="restaurants__content-list-item"
                    v-for="restaurant in mainStore.restaurants"
                >
                    <CardRestaurant :restaurant />
                </li>
            </ul>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";

.restaurants {
    background-image: url("/assets/images/bgMain2.png");
    &__content {
        padding: 70px 0 120px 0;
        @media (max-width: $mobileScreen) {
            padding: 40px 0;
        }
        &-list {
            display: flex;
            justify-content: center;
            gap: 90px;
            flex-flow: row wrap;
            @media (max-width: $mobileScreen) {
                gap: 30px;
            }
            &-item {
                cursor: pointer;
            }
        }
    }
}
</style>
