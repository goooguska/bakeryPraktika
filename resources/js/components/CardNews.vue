<script setup>
import ButtonComponent from "./UI/ButtonComponent.vue";

defineProps({
    item: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <div class="card">
        <div class="card__image">
            <img
                class="card__image-img"
                :src="`${item.attributes.image}`"
                alt="news"
            />
        </div>
        <div class="card__content">
            <p class="card__content-title">{{ item.attributes.name }}</p>
            <p class="card__content-info">{{ item.attributes.info }}</p>
            <p class="card__content-date">{{ item.attributes.date_news }}</p>
            <div class="card__content-btn">
                <ButtonComponent>Подробнее </ButtonComponent>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";
.card {
    max-width: 1150px;
    width: 100%;
    margin-bottom: 5%;
    display: flex;
    align-items: center;
    &__image {
        &-img {
            max-width: 472px;
            border-radius: 30px;
            @media (max-width: $tabletScreen) {
                width: 100%;
            }
            @media (max-width: $mobileScreen) {
            }
        }
    }
    &__content {
        display: block;
        margin-left: 30px;
        &-title {
            @include fontStyle(50px, 600, "Alumni Sans", $dark-brown);
        }
        &-info {
            margin-top: 15px;
            margin-bottom: 15px;
            @include fontStyle(30px, 600, "Alumni Sans", $dark-brown);
            @media (max-width: $mobileScreen) {
                display: none;
            }
        }
        &-date {
            @include fontStyle(25px, 600, "Alumni Sans", $dark-brown);
        }
        &-btn {
            width: 100%;
            max-width: 270px;
            margin-top: 5%;
            text-align: center;
        }
    }
}
</style>
