<script setup>
import { ref } from "vue";

const showPopup = ref(false);

defineProps({
    restaurant: {
        type: Object,
        required: true,
    },
});
const getMoreInfoAboutRestaurant = () => {
    showPopup.value = !showPopup.value;
};
</script>

<template>
    <div @click="getMoreInfoAboutRestaurant" class="card">
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
                    @click="getMoreInfoAboutRestaurant"
                    class="card-popup__content-close"
                    src="/assets/icons/close.svg"
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
        left: 40px;
    }
    &-image {
        max-width: 762px;
        width: 100%;
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
            pointer-events: none;
        }
        &-title {
            top: 60%;
        }
        &-street {
            top: 68%;
        }
        &-phone {
            top: 76%;
        }
        &-email {
            top: 84%;
        }
        &-close {
            position: absolute;
            top: 32px;
            right: 43px;
            cursor: pointer;
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
