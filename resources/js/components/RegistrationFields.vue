<script setup>
import { ref } from "vue";
import { useUserStore } from "../store/UserStore";
const userStore = useUserStore();

const login = ref("");
const firstName = ref("");
const password = ref("");
const password_confirmation = ref("");
const email = ref("");
const phoneNumber = ref("");
</script>

<template>
    <div class="registration">
        <h2 class="registration-title">Регистрация</h2>
        <form class="fields">
            <ul class="registration__list">
                <li class="registration__list-item">
                    <label for="login">Введите ваш логин </label>
                    <input
                        class="registration__list-item-input"
                        placeholder="Логин"
                        name="login"
                        type="text"
                        v-model="login"
                    />
                </li>

                <li class="registration__list-item">
                    <label for="password">Введите ваш пароль </label>
                    <input
                        class="registration__list-item-input"
                        placeholder="Пароль"
                        name="password"
                        type="password"
                        v-model="password"
                    />
                </li>

                <li class="registration__list-item">
                    <label for="password_confirm">Подтверждённый пароль </label>
                    <input
                        class="registration__list-item-input"
                        placeholder="Подтверждённый пароль"
                        name="password_confirmation"
                        type="password"
                        v-model="password_confirmation"
                    />
                </li>
            </ul>
            <ul class="registration__list">
                <li class="registration__list-item">
                    <label for="firstName"> Введите ваше имя </label>
                    <input
                        class="registration__list-item-input"
                        placeholder="Имя"
                        name="firstName"
                        type="text"
                        v-model="firstName"
                    />
                </li>

                <li class="registration__list-item">
                    <label for="name"> Введите ваш email</label>
                    <input
                        class="registration__list-item-input"
                        placeholder="Email"
                        name="email"
                        type="email"
                        v-model="email"
                    />
                </li>

                <li class="registration__list-item">
                    <label for="phone"> Введите ваш телефон</label>
                    <input
                        class="registration__list-item-input"
                        placeholder="Телефон"
                        name="phone"
                        type="text"
                        v-model="phoneNumber"
                    />
                </li>
            </ul>
        </form>
        <p v-if="userStore.errorUser !== ''" class="error">
            {{ userStore.errorUser }}
        </p>

        <div class="registration__btn">
            <input
                @click.prevent="
                    userStore.regNewUser(
                        login,
                        firstName,
                        password,
                        password_confirmation,
                        email,
                        phoneNumber
                    )
                "
                class="registration__btn-input"
                type="submit"
                value="Зарегистрироваться"
            />
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";
.fields {
    margin-top: 100px;
    display: flex;
    justify-content: space-around;
}
.registration {
    &__list {
        max-width: 620px;
        width: 100%;
        &-item {
            margin-bottom: 12px;
            @include fontStyle(50px, 400, "Alumni Sans", $dark-brown);
        }
        input {
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
    }
    &__btn {
        margin-top: 60px;
        display: flex;
        justify-content: center;
        &-input {
            max-width: 620px;
            width: 100%;
            @include buttonStyle;

            &::placeholder {
                color: rgba(162, 81, 51, 0.5);
            }
            &:focus {
                outline: none;
                border-color: $dark-brown;
                box-shadow: 0 0 5px $dark-brown;
            }
        }
    }
}
.error {
    text-align: center;
    padding-top: 20px;
    @include fontStyle(30px, 400, "Alumni Sans", $dark-brown);
}
</style>
