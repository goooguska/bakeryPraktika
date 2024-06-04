import { defineStore } from "pinia";
import { ref } from "vue";
export const useMainStore = defineStore("mainStore", () => {
    const slides = ref([
        {
            image: "assets/images/slider1.png",
            text: "Булочки с кунжутиком",
        },
        {
            image: "assets/images/slider2.png",
            text: "Полные круассаны",
        },
        {
            image: "assets/images/slider3.png",
            text: "Подготовленные к лету круассаны",
        },
        {
            image: "assets/images/slider4.png",
            text: "Великолепные корзинки",
        },
    ]);
    const restaurants = ref([
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
    ]);
    return { restaurants, slides };
});
