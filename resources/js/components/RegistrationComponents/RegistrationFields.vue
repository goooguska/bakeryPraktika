<script setup>
import InputComponent from "../UI/InputComponent.vue";
</script>

<template>
    <div class="registration">
        <h2 class="registration-title">Регистрация</h2>
        <form class="fields">
            <ul class="registration__list">
                <li class="registration__list-item">
                    <label for="login">Введите ваш логин </label>
                    <InputComponent
                        class="registration__list-item-input"
                        placeholder="Логин"
                        name="login"
                        type="text"
                    />
                </li>

                <li class="registration__list-item">
                    <label for="password">Введите ваш пароль </label>
                    <InputComponent
                        class="registration__list-item-input"
                        placeholder="Пароль"
                        name="password"
                        type="password"
                    />
                </li>

                <li class="registration__list-item">
                    <label for="confPassword">Подтверждённый пароль </label>
                    <InputComponent
                        class="registration__list-item-input"
                        placeholder="Подтверждённый пароль"
                        name="confPassword"
                        type="password"
                    />
                </li>
            </ul>
            <ul class="registration__list">
                <li class="registration__list-item">
                    <label for="name"> Введите ваше имя </label>
                    <InputComponent
                        class="registration__list-item-input"
                        placeholder="Имя"
                        name="name"
                        type="text"
                    />
                </li>

                <li class="registration__list-item">
                    <label for="name"> Введите ваш email</label>
                    <InputComponent
                        class="registration__list-item-input"
                        placeholder="Email"
                        name="email"
                        type="email"
                    />
                </li>

                <li class="registration__list-item">
                    <label for="phone"> Введите ваш телефон</label>
                    <InputComponent
                        class="registration__list-item-input"
                        placeholder="Телефон"
                        name="phone"
                        type="text"
                    />
                </li>
            </ul>
        </form>

        <div class="registration-btn">
            <InputComponent
                class="registration__list-item-input"
                type="submit"
            />
            <!-- <ButtonComponent type="submit">Зарегистрироваться </ButtonComponent> -->
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
    }
    &-btn {
        margin-top: 120px;
        display: flex;
        justify-content: center;
    }
}
</style>
