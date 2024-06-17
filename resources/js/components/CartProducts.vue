<script setup>
import { useCartStore } from "../store/CartStore";
import { useMainStore } from "../store/MainStore";

const mainStore = useMainStore();
const cartStore = useCartStore();
</script>

<template>
    <div class="popup">
        <img
            @click="mainStore.popupCart = !mainStore.popupCart"
            class="popup__close"
            src="/assets/icons/close.svg"
            alt="close"
        />
        <h2 class="popup__title">Корзина</h2>
        <div class="popup__items">
            <div
                class="popup__items-product"
                v-for="(item, index) in cartStore.cartItems"
                :key="index"
            >
                <img
                    class="popup__items-product-image"
                    :src="item.image"
                    alt=""
                />
                <div class="popup__items-product-info">
                    <p class="popup__items-product-info-name">
                        {{ item.name }}
                    </p>
                    <p class="popup__items-product-info-weight">
                        {{ item.weight }} грамм
                    </p>
                    <p class="popup__items-product-info-quantity">
                        {{ item.quantity }} в наличии
                    </p>
                </div>
                <p class="popup__items-product-cost">
                    {{ cartStore.costProduct }}₽
                </p>
                <div class="btns">
                    <span
                        @click="
                            cartStore.minusProduct(
                                item,
                                costProduct,
                                countProduct
                            )
                        "
                        class="popup__items-product-minus btn"
                        >-</span
                    >

                    <p class="popup__items-product-quantity">
                        {{ cartStore.countProduct }}
                    </p>
                    <span
                        @click="
                            cartStore.plusProduct(
                                item,
                                costProduct,
                                countProduct
                            )
                        "
                        class="popup__items-product-plus btn"
                        >+</span
                    >
                </div>
            </div>
            <p class="popup__totalCost">Всего: {{ cartStore.totalCost }} ₽</p>
            <button class="popup__order">Заказать</button>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";
.btn {
    cursor: pointer;
    @include fontStyle(70px, 100, "Alumni Sans", $dark-brown);
}
.btns {
    display: flex;
    align-items: center;
    gap: 10px;
}
.popup {
    padding-top: 50px;
    position: relative;
    text-align: center;
    background-color: $white;
    width: 70%;
    max-width: 846px;
    border-radius: 30px;
    &__totalCost {
        text-align: left;
        @include fontStyle(50px, 500, "Alumni Sans", $dark-brown);
    }
    &__order {
        @include buttonStyle;
    }
    &__close {
        max-width: 100px;
        width: 100%;
        position: absolute;
        top: 5%;
        right: 5%;
        cursor: pointer;
        @media (max-width: $extraLargeScreen) {
            width: 50%;
        }
        @media (max-width: $tabletScreen) {
            width: 10%;
        }
    }

    &__items {
        display: flex;
        flex-direction: column;
        gap: 30px;
        padding: 30px;
        &-product {
            padding: 30px;
            background-color: #fcfcff;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            &-image {
                max-width: 134px;
                width: 100%;
            }
            &-info {
                text-align: left;
                &-name {
                    @include fontStyle(30px, 500, "Alumni Sans", $dark-brown);
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
            &-quantity {
                @include fontStyle(30px, 500, "Alumni Sans", $dark-brown);
            }
            &-cost {
                @include fontStyle(40px, 500, "Alumni Sans", $dark-brown);
            }
        }
    }
}
</style>
