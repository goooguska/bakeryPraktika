<script setup>
import CardRestaurant from "../CardRestaurant.vue";
const restaurants = [
    {
        name: "Пышка Чистые пруды:",
        image: "/assets/images/ChistiePryds.png",
        location: "Чистые пруды",
        street: "Мясницкая ул. 24",
        phoneNumber: "8 800 555 35 35",
        email: "pishkabakery@gmail.ru",
    },
    {
        name: "Пышка Цветной бульвар:",
        image: "/assets/images/TsventoyeBoolvar.png",
        location: "Цветной бульвар",
        street: "Цветной бульвар, 16",
        phoneNumber: "8 800 555 35 35",
        email: "pishkabakery@gmail.ru",
    },
    {
        name: "Пышка Новый Арбат:",
        image: "/assets/images/NovieArbat.png",
        location: "Новый Арбат",
        street: "Новый Арбат ул. 17",
        phoneNumber: "8 800 555 35 35",
        email: "pishkabakery@gmail.ru",
    },
];
</script>

<template>
    <div class="restaurants">
        <div class="restaurants__content">
            <ul class="restaurants__content-list">
                <li
                    class="restaurants__content-list-item"
                    v-for="restaurant in restaurants"
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
