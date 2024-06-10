<script setup>
import ButtonComponent from "./UI/ButtonComponent.vue";

defineProps({
    product: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <div class="popup">
        <img
            @click="$emit('closePopup')"
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
                    <p class="popup__content-calories-value">
                        Пищевая ценность на 100 гр продукта
                    </p>
                    <ul class="popup__content-calories-list">
                        <li class="popup__content-calories-list-item">
                            <p
                                class="popup__content-calories-list-item-text-number"
                            >
                                420
                            </p>
                            <p class="popup__content-calories-list-item-text">
                                ккал
                            </p>
                        </li>
                        <li class="popup__content-calories-list-item">
                            <p
                                class="popup__content-calories-list-item-text-number"
                            >
                                5.5
                            </p>
                            <p class="popup__content-calories-list-item-text">
                                белки
                            </p>
                        </li>
                        <li class="popup__content-calories-list-item">
                            <p
                                class="popup__content-calories-list-item-text-number"
                            >
                                28
                            </p>
                            <p class="popup__content-calories-list-item-text">
                                жиры
                            </p>
                        </li>
                        <li class="popup__content-calories-list-item">
                            <p
                                class="popup__content-calories-list-item-text-number"
                            >
                                36
                            </p>
                            <p class="popup__content-calories-list-item-text">
                                углеводы
                            </p>
                        </li>
                    </ul>
                    <p class="popup__content-calories-weight">
                        Вес блюда: 90 г
                    </p>
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
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";
.popup {
    position: relative;
    padding: 130px 50px 50px 50px;
    background-color: $white;
    width: 100%;
    max-width: 800px;
    border-radius: 30px;
    width: 100%;
    @media (max-width: $laptopScreen) {
        width: 70%;

        padding: 70px 25px 25px 25px;
    }
    &__close {
        max-width: 100px;
        width: 100%;
        position: absolute;
        top: 2%;
        right: 5%;
        cursor: pointer;
        @media (max-width: $laptopScreen) {
            width: 10%;
        }
    }
    &__content {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        text-align: center;
        &-image {
            width: 100%;
            max-width: 500px;
            border-radius: 30px;
        }
        &-info {
            margin-left: 30px;
            @media (max-width: $laptopScreen) {
                margin-left: 0px;
            }
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
            margin-top: 40px;
            padding: 15px 70px;
            background-color: #f4f4f7;
            border-radius: 30px;
            text-align: center;
            @media (max-width: $laptopScreen) {
                padding: 5px 5px;
                margin-top: 20px;
            }
            &-value {
                @include fontStyle(20px, 500, "Alumni Sans", $dark-brown);
            }
            &-weight {
                @include fontStyle(
                    20px,
                    500,
                    "Alumni Sans",
                    rgba(162, 81, 51, 0.6)
                );
            }
            &-list {
                margin-top: 15px;
                margin-bottom: 15px;
                display: flex;
                justify-content: center;
                gap: 30px;
                @media (max-width: $laptopScreen) {
                    margin-top: 5px;
                    margin-bottom: 5px;
                    gap: 5px;
                }
                &-item {
                    &-text {
                        @include fontStyle(
                            20px,
                            500,
                            "Alumni Sans",
                            rgba(162, 81, 51, 0.6)
                        );
                    }
                    &-text-number {
                        @include fontStyle(
                            30px,
                            500,
                            "Alumni Sans",
                            $dark-brown
                        );
                    }
                }
            }
        }
    }
    &__description {
        margin-top: 30px;
        display: flex;
        align-items: center;
        justify-content: center;

        gap: 60px;
        @media (max-width: $mobileScreen) {
            gap: 0px;
        }
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
