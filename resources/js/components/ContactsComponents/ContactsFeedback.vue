<script setup>
import { ref } from "vue";
import { useUserStore } from "../../store/UserStore";
const userMail = ref("");
const userStore = useUserStore();

const sendUserEmail = async () => {
    await userStore.sendEmail(userMail.value);
    userMail.value = "";
};
</script>

<template>
    <div class="feedback">
        <p class="feedback-info">Узнайте первым о наших новинках</p>
        <div class="feedback__items">
            <input
                class="feedback__items-input"
                v-model="userMail"
                placeholder="Ваша электронная почта"
            />
            <input
                class="feedback__items-btn"
                value="Подписаться"
                @click.prevent="sendUserEmail"
                type="submit"
            />
            <div class="feedback__items-popup">
                <p class="feedback__items-popup-text">
                    {{ userStore.successMessage }}
                </p>
            </div>
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
        position: relative;
        @media (max-width: $laptopScreen) {
            margin: 20px 0;
        }
        &-input {
            max-width: 620px;
            width: 100%;
            @include inputStyle;

            @media (max-width: $laptopScreen) {
                width: 40%;
            }

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
            @include buttonStyle;

            padding: 22px 100px;
            @media (max-width: $tabletScreen) {
                padding: 22px 50px;
            }
            @media (max-width: $mobileScreen) {
                padding: 10px 20px;
            }
        }
        &-popup {
            position: absolute;
            background-color: white;
            top: -30%;
            left: 25%;
            &-text {
                @include fontStyle(20px, 400, "Alumni Sans", $dark-brown);
            }
        }
    }
    &-info {
        @include fontStyle(50px, 400, "Alumni Sans", $dark-brown);
    }
    &__socials {
        margin-top: 10%;
        display: flex;
        justify-content: center;
        gap: 40px;
        margin-bottom: 5px;
        position: relative;

        &-item {
            width: 100%;
            @media (max-width: $mobileScreen) {
                width: 70%;
            }
        }
        &-link {
            justify-content: center;
            display: flex;
            max-width: 107px;
            width: 100%;
            @media (max-width: $mobileScreen) {
                width: 50%;
            }
            p {
                color: $dark-brown;
            }
        }
    }
}
.small {
    @include fontStyle(20px, 400, "Alumni Sans", $dark-brown);
}
</style>
