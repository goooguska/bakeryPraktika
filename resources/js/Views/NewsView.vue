<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";
import CardNews from "../components/CardNews.vue";
const newsList = ref([]);
onMounted(async () => {
    const response = ref();
    try {
        const response = await axios.get("http://127.0.0.1:8000/api/v1/news");
        newsList.value = response.data;
        console.log(newsList);
    } catch (error) {
        console.error(error);
    }
});
</script>

<template>
    <div class="news">
        <div class="news__content">
            <h1>НОВОСТИ</h1>
            <ul class="news__list">
                <li v-for="item in newsList.data" :key="item.id">
                    <CardNews :item />
                </li>
            </ul>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";
.news {
    background-image: url("/public/assets/images/newsBG.png");
    &__content {
        padding: 30px 60px 180px 60px;
    }
}
</style>
