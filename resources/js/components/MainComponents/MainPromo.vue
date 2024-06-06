<script setup></script>

<template>
    <div class="promo">
        <div class="promo__image">
            <img
                class="promo__image-img"
                src="/assets/images/baget.png"
                alt=""
            />
            <div class="promo__image-tradition">
                <h2 class="promo__image-tradition-subtitle">ТРАДИЦИИ</h2>
            </div>
            <div class="promo__image-centered">
                <h1 class="promo__image-centered-title">ПЫШКА</h1>
            </div>
            <div class="promo__image-art">
                <h2 class="promo__image-art-subtitle">ИСКУССТВО</h2>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";

.promo {
    position: relative;
    text-align: center;
    &__image {
        &-img {
            width: 100%;
            max-width: 1920px;
        }
        &-centered {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, 50%);
        }
        &-tradition {
            position: absolute;
            top: 5%;
            left: 5%;
        }
        &-art {
            position: absolute;
            bottom: 5%;
            right: 5%;
        }
    }
}
</style>
