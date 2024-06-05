<script setup>
import { ref } from "vue";

const showPopup = ref(false);

defineProps({
    restaurant: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <div @click="showPopup = !showPopup" class="card">
        <img class="card-image" :src="`${restaurant.image}`" alt="restaurant" />
        <p class="card-title">{{ restaurant.location }}</p>
    </div>
    <Teleport to="body">
        <div v-show="showPopup" class="card-popup">
            <div class="card-popup__content">
                <img
                    class="card-popup__content-image"
                    :src="`${restaurant.image}`"
                    alt="restaurant"
                />

                <p class="card-popup__content-title info">
                    {{ restaurant.name }}
                </p>
                <p class="card-popup__content-street info">
                    {{ restaurant.street }}
                </p>
                <p class="card-popup__content-phone info">
                    Телефон: {{ restaurant.phoneNumber }}
                </p>
                <p class="card-popup__content-email info">
                    Почта: {{ restaurant.email }}
                </p>
                <img
                    @click="showPopup = !showPopup"
                    class="card-popup__content-close"
                    src="/public/assets/icons/close.svg"
                    alt="close"
                />
            </div>
        </div>
    </Teleport>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";

.card {
    position: relative;
    text-align: center;

    &-title {
        @include fontStyle(70px, 600, "Alumni Sans", $light-brown);
        position: absolute;
        bottom: 20px;
        left: 15%;
        @media (max-width: $tabletScreen) {
            left: 20%;
        }
        @media (max-width: $mobileScreen) {
            left: 30%;
        }
    }
    &-image {
        max-width: 762px;
        width: 100%;
        @media (max-width: $extraLargeScreen) {
            width: 80%;
        }
        @media (max-width: $tabletScreen) {
            width: 70%;
        }
        @media (max-width: $mobileScreen) {
            width: 50%;
        }
    }
}
.card-popup {
    display: flex;
    width: 100%;
    position: fixed;
    inset: 0;
    justify-content: center;
    align-items: center;
    background-color: rgba(0, 0, 0, 0.3);
    cursor: default;
    &__content {
        position: relative;
        text-align: center;
        &-image {
            max-width: 1142px;
            pointer-events: none;
            width: 100%;
            @media (max-width: $extraLargeScreen) {
                width: 80%;
            }
            @media (max-width: $mobileScreen) {
                width: 50%;
            }
        }
        &-title {
            top: 60%;
            @media (max-width: $mobileScreen) {
                top: 50%;
            }
        }
        &-street {
            top: 68%;
            @media (max-width: $mobileScreen) {
                top: 58%;
            }
        }
        &-phone {
            top: 76%;
            @media (max-width: $mobileScreen) {
                top: 66%;
            }
        }
        &-email {
            top: 84%;
            @media (max-width: $mobileScreen) {
                top: 74%;
            }
        }
        &-close {
            max-width: 100px;
            width: 100%;
            position: absolute;
            top: 32px;
            right: 43px;
            cursor: pointer;
            @media (max-width: $extraLargeScreen) {
                width: 50%;
                right: 12%;
            }
            @media (max-width: $tabletScreen) {
                width: 10%;
            }
            @media (max-width: $mobileScreen) {
                width: 5%;
                right: 27%;
                top: 5%;
            }
        }
    }
}
.info {
    position: absolute;
    left: 50%;
    transform: translate(-50%, 50%);

    @include fontStyle(50px, 600, "Alumni Sans", $light-brown);
}
</style>
