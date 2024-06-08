<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";
import CardProduct from "../components/CardProduct.vue";
const productList = ref([]);

const types = [
    {
        name: "Круассаны",
        anchor: "croissants",
    },
    {
        name: "Пирожки",
        anchor: "pies",
    },
    {
        name: "Десерты",
        anchor: "dessert",
    },
    {
        name: "Печенье",
        anchor: "cookies",
    },

    {
        name: "Хлеб",
        anchor: "bread",
    },
    {
        name: "Холодные напитки",
        anchor: "coldDrinks",
    },
    {
        name: "Горячие напитки",
        anchor: "hotDrinks",
    },
];
onMounted(async () => {
    const response = ref();
    try {
        const response = await axios.get(
            "http://127.0.0.1:8000/api/v1/products"
        );
        productList.value = response.data;
    } catch (error) {
        console.error(error);
    }
});
const filteredProducts = (type) => {
    if (productList.value.data) {
        return productList.value.data.filter(
            (product) => product.attributes.type === type
        );
    } else {
        return [];
    }
};
</script>

<template>
    <h1>Меню</h1>
    <div class="menu">
        <div class="menu__points">
            <ul class="menu__points-list">
                <a href="#croissants">
                    <li class="menu__points-list-item">Круассаны</li>
                </a>
                <a href="#pies">
                    <li class="menu__points-list-item">Пирожки</li>
                </a>
                <a href="#dessert">
                    <li class="menu__points-list-item">Десерты</li>
                </a>
                <a href="#cookies">
                    <li class="menu__points-list-item">Печенье</li>
                </a>
                <a href="#bread">
                    <li class="menu__points-list-item">Хлеб</li>
                </a>
                <a href="#coldDrinks">
                    <li class="menu__points-list-item">Холодные напитки</li>
                </a>
                <a href="#hotDrinks">
                    <li class="menu__points-list-item">Горячие напитки</li>
                </a>
            </ul>
        </div>
        <div class="menu__sections">
            <ul class="menu__sections-list" v-for="item in types" :key="item">
                <p :id="item.anchor" class="menu__sections-list-title">
                    {{ item.name }}
                </p>
                <div class="menu__sections-list-items">
                    <li
                        v-for="product in filteredProducts(item.name)"
                        :key="product.id"
                        class="menu__sections-section-card"
                    >
                        <CardProduct :product />
                    </li>
                </div>
            </ul>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";
.menu {
    display: flex;
    &__points {
        max-width: 300px;
        width: 100%;
        &-list {
            &-item {
                @include fontStyle(50px, 500, "Alumni Sans", $dark-brown);
            }
        }
    }
    &__sections {
        margin-left: 50px;
        &-list {
            &-items {
                // display: flex;
                // flex-flow: row wrap;
                // gap: 30px;
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(180px, 464px));
                grid-gap: 1em;
            }
            &-title {
                margin-bottom: 12px;
                @include fontStyle(70px, 500, "Alumni Sans", $dark-brown);
            }
        }
        &-list::after {
            content: "";
            display: block;
            height: 2px;
            width: 1454px;
            background-color: #938989;
            margin-top: 50px;
            margin-bottom: 50px;
        }
    }
}
</style>
