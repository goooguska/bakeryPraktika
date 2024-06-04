<script setup>
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import { Navigation } from "swiper/modules";
import { Swiper, SwiperSlide } from "swiper/vue";
import { useMainStore } from "../../store/MainStore";
const modules = [Navigation];
const mainStore = useMainStore();
</script>
<template>
    <swiper
        :slidesPerView="4"
        :spaceBetween="20"
        :loop="true"
        :modules="modules"
        class="mySwiper"
    >
        <swiper-slide v-for="slide in mainStore.slides">
            <img class="image" :src="`${slide.image}`" alt="#" />
            <p class="text">{{ slide.text }}</p>
        </swiper-slide>
        <swiper-slide v-for="slide in mainStore.slides">
            <img class="image" :src="`${slide.image}`" alt="#" />
            <p class="text">{{ slide.text }}</p>
        </swiper-slide>
    </swiper>
</template>

<style lang="scss" scoped>
@import "/resources/css/style.css";
@import "/resources/css/main.scss";
.mySwiper {
    margin-top: 80px;
}
.text {
    @include fontStyle(40px, 600, "Alumni Sans", $dark-brown);
}
</style>
