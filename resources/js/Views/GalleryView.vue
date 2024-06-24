<script setup>
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import { Navigation } from "swiper/modules";
import { Swiper, SwiperSlide } from "swiper/vue";
import { useMainStore } from "../store/MainStore";
const modules = [Navigation];
const mainStore = useMainStore();
</script>

<template>
    <div>
        <h1>Галерея</h1>
        <swiper
            :slidesPerView="4"
            :spaceBetween="20"
            :loop="true"
            :modules="modules"
            class="mySwiper"
        >
            <swiper-slide
                v-for="(slide, index) in mainStore.slides"
                :key="index"
            >
                <img class="image" :src="`${slide.image}`" alt="#" />
                <p class="text">{{ slide.text }}</p>
            </swiper-slide>
            <swiper-slide
                v-for="(slide, index) in mainStore.slides"
                :key="index"
            >
                <img class="image" :src="`${slide.image}`" alt="#" />
                <p class="text">{{ slide.text }}</p>
            </swiper-slide>
        </swiper>
    </div>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";
@import "/resources/css/style.css";

.text {
    @include fontStyle(40px, 600, "Alumni Sans", $dark-brown);
}
</style>
