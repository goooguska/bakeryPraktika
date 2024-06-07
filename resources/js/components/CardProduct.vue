<script setup>
import { ref } from "vue";
import ButtonComponent from "./UI/ButtonComponent.vue";
const showPopup = ref(false);
defineProps({
    product: {
        type: Object,
        required: true,
    },
});
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
        <div class="card-btns" @click="showPopup = !showPopup">
            <ButtonComponent>Заказать </ButtonComponent>
        </div>

        <div class="popup" v-show="showPopup">
            <img
                @click="showPopup = !showPopup"
                class="popup__close"
                src="/assets/icons/close.svg"
                alt="close"
            />
            <div class="popup__content">
                <img
                    :src="product.attributes.image"
                    alt=""
                    class="popup__content-image"
                />
                <div class="popup__content-info">
                    <div class="popup__content-text">
                        <p class="popup__content-text-title">
                            Круассан крем чиз с карамелью
                        </p>
                        <p class="popup__content-text-subtitle">
                            Воздушный круассан с творожным сыром и карамельным
                            кремом, покрыт белым шоколадом
                        </p>
                    </div>
                    <div class="popup__content-calories">
                        <p>Пищевая ценность на 100 гр продукта</p>
                        <ul class="popup__content-calories-list">
                            <li class="popup__content-calories-list-item">
                                <p
                                    class="popup__content-calories-list-item-text-number"
                                >
                                    420
                                </p>
                                <p
                                    class="popup__content-calories-list-item-text"
                                >
                                    ккал
                                </p>
                            </li>
                            <li class="popup__content-calories-list-item">
                                <p
                                    class="popup__content-calories-list-item-text-number"
                                >
                                    5.5
                                </p>
                                <p
                                    class="popup__content-calories-list-item-text"
                                >
                                    белки
                                </p>
                            </li>
                            <li class="popup__content-calories-list-item">
                                <p
                                    class="popup__content-calories-list-item-text-number"
                                >
                                    28
                                </p>
                                <p
                                    class="popup__content-calories-list-item-text"
                                >
                                    жиры
                                </p>
                            </li>
                            <li class="popup__content-calories-list-item">
                                <p
                                    class="popup__content-calories-list-item-text-number"
                                >
                                    36
                                </p>
                                <p
                                    class="popup__content-calories-list-item-text"
                                >
                                    углеводы
                                </p>
                            </li>
                        </ul>
                        <p>Вес блюда: 90 г</p>
                    </div>
                </div>
            </div>
            <div class="popup__description">
                <div class="popup__description-text">
                    <p class="popup__description-text-title">Состав:</p>
                    <p class="popup__description-text-subtitle">
                        Мука пшеничная в.с., шоколад белый (сахар, какао масло,
                        цельное сухое молоко, натуральный экстракт ванили),
                    </p>
                </div>
                <ButtonComponent>Заказать </ButtonComponent>
            </div>
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
.popup {
    padding: 50px;
    position: absolute;
    max-width: 1146px;
    background-color: $white;
    border-radius: 30px;

    &__close {
    }
    &__content {
        display: flex;
        &-image {
            width: 100%;
            max-width: 500px;
            border-radius: 30px;
        }
        &-info {
        }
        &-text {
            &-title {
                @include fontStyle(40px, 500, "Alumni Sans", $dark-brown);
            }
            &-subtitle {
                @include fontStyle(30px, 500, "Alumni Sans", $dark-brown);
            }
        }
        &-calories {
            &-list {
                &-item {
                }
            }
        }
    }
    &__description {
        margin-top: 30px;
        display: flex;
        align-items: center;
        gap: 60px;
        &-text {
            max-width: 570px;
            &-title {
                @include fontStyle(30px, 500, "Alumni Sans", $dark-brown);
            }
            &-subtitle {
                @include fontStyle(
                    30px,
                    500,
                    "Alumni Sans",
                    rgba(162, 81, 51, 0.6)
                );
            }
        }
    }
}
</style>
