<script setup>
import ButtonComponent from "../UI/ButtonComponent.vue";
import InputComponent from "../UI/InputComponent.vue";
</script>

<template>
    <div class="feedback">
        <p class="feedback-info">Узнайте первым о наших новинках</p>
        <div class="feedback__input">
            <InputComponent placeholder="Ваша электронная почта">
            </InputComponent>
            <ButtonComponent class="feedback__input-btn"
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
                    src="/public/assets/icons/vkontacte.svg"
                    alt="vk"
                    class="feedback__socials-item"
                />
            </a>
            <a
                class="feedback__socials-link"
                href="https://www.instagram.com/goooguska?igsh=MTRiMmhmOHE0ZzY1MA%3D%3D&utm_source=qr"
            >
                <img
                    src="/public/assets/icons/instagram.svg"
                    alt="insta"
                    class="feedback__socials-item"
                />
                <p>*</p>
            </a>
            <a class="feedback__socials-link" href="https://t.me/Trikli">
                <img
                    src="/public/assets/icons/telegram.svg"
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
    &__input {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 50px;
        margin: 56px 0;
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
