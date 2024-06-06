<script setup>
import ButtonComponent from "../UI/ButtonComponent.vue";
</script>

<template>
    <div class="feedback">
        <p class="feedback-info">Узнайте первым о наших новинках</p>
        <div class="feedback__items">
            <input class="feedback__items-input" placeholder="Ваша электронная почта">
            </input>
            <ButtonComponent class="feedback__items-btn"
                >Подписаться
            </ButtonComponent>
        </div>

        <p class="feedback-info">
            Получайте информацию о новых продуктах, акциях и специальных
            предложениях
        </p>
        <div class="feedback__socials">
            <a class="feedback__socials-link" href="https://vk.com/goooguska">
                <img
                    src="/assets/icons/vkontacte.svg"
                    alt="vk"
                    class="feedback__socials-item"
                />
            </a>
            <a
                class="feedback__socials-link"
                href="https://www.instagram.com/goooguska?igsh=MTRiMmhmOHE0ZzY1MA%3D%3D&utm_source=qr"
            >
                <img
                    src="/assets/icons/instagram.svg"
                    alt="insta"
                    class="feedback__socials-item"
                />
                <p>*</p>
            </a>
            <a class="feedback__socials-link" href="https://t.me/Trikli">
                <img
                    src="/assets/icons/telegram.svg"
                    alt="tg"
                    class="feedback__socials-item"
                />
            </a>
        </div>
        <div class="small">
            <p>
                * Instagram — принадлежит компании Meta Platforms, которая была
                признана экстремистской организацией в России и запрещена.
            </p>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";

.feedback {
    text-align: center;
    &__items {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 50px;
        margin: 56px 0;
       &-input{
        max-width: 620px;
            width: 100%;
            @include inputStyle;
            &::placeholder {
                color: rgba(162, 81, 51, 0.5);
            }
            &:focus {
                outline: none;
                border-color: $dark-brown;
                box-shadow: 0 0 5px $dark-brown;
            }
       }
        &-btn {
            padding: 22px 100px;
        }
    }
    &-info {
        @include fontStyle(50px, 400, "Alumni Sans", $dark-brown);
    }
    &__socials {
        margin-top: 100px;
        display: flex;
        justify-content: center;
        gap: 40px;
        margin-bottom: 80px;
        position: relative;

        &-link {
            display: flex;
            p {
                color: $dark-brown;
            }
        }
    }
}
.small {
    color: $dark-brown;
}
</style>
