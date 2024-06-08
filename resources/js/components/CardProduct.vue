<script setup>
import { ref } from "vue";
import PopupProduct from "./PopupProduct.vue";
import ButtonComponent from "./UI/ButtonComponent.vue";
const showPopupProduct = ref(false);

defineProps({
    product: {
        type: Object,
        required: true,
    },
});
const toggleShowPopup = () => {
    showPopupProduct.value = !showPopupProduct.value;
};
</script>

<template>
    <div class="card">
        <img :src="product.attributes.image" alt="product" class="card-image" />

        <div class="card__content">
            <p class="card__content-name">
                {{ product.attributes.name }}
            </p>
            <p class="card__content-cost">{{ product.attributes.cost }} ₽</p>
            <p class="card__content-weight">
                {{ product.attributes.weight }} грамм
            </p>
            <p class="card__content-quantity">
                {{ product.attributes.quantity }} в наличии
            </p>
        </div>
        <div class="card-btns" @click="toggleShowPopup">
            <ButtonComponent>Заказать </ButtonComponent>
        </div>
        <div class="product" v-show="showPopupProduct">
            <PopupProduct :product @closePopup="toggleShowPopup" />
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";

.card {
    max-width: 464px;
    width: 100%;
    background-color: rgba(252, 252, 255, 1);

    &-image {
        max-width: 464px;
        width: 100%;
        border-radius: 30px;
    }
    &__content {
        &-name {
            @include fontStyle(40px, 500, "Alumni Sans", $dark-brown);
        }
        &-cost {
            @include fontStyle(40px, 500, "Alumni Sans", $dark-brown);
        }
        &-weight {
            @include fontStyle(
                20px,
                500,
                "Alumni Sans",
                rgba(162, 81, 51, 0.6)
            );
        }
        &-quantity {
            @include fontStyle(30px, 500, "Alumni Sans", $dark-brown);
        }
    }
    &-btns {
        margin-top: 20px;
        text-align: center;
    }
}
.product {
    z-index: 5;
    width: 100%;
    position: fixed;
    inset: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: rgba(0, 0, 0, 0.3);
    cursor: default;
}
</style>
