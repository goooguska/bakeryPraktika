<script setup>
import { onMounted, ref } from "vue";
import { useUserStore } from "../../store/UserStore";
const userStore = useUserStore();
const userInfo = ref();
onMounted(async () => {
    const response = await userStore.getInfoAboutUser();
    userInfo.value = response;
});
</script>

<template>
    <div class="profile" v-if="userInfo">
        <div class="profile__description">
            <p class="profile__description-text" v-if="userInfo.role_id === 2">
                Администратор
            </p>
            <p class="profile__description-text">
                Ваш логин: {{ userInfo.login }}
            </p>
            <p class="profile__description-text">
                Ваше имя: {{ userInfo.firstName }}
            </p>
            <p class="profile__description-text">
                Ваша почта: {{ userInfo.email }}
            </p>
            <p class="profile__description-text">
                Номер телефона: {{ userInfo.phoneNumber }}
            </p>
        </div>
        <div class="profile__btns">
            <RouterLink
                class="profile__btns-admin"
                v-if="userInfo.role_id === 2"
                to="/admin/login"
                >Панель Администратора
            </RouterLink>
            <button
                @click.prevent="userStore.logoutUser"
                class="profile__btns-link"
            >
                Выйти
            </button>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";

.profile {
    &__description {
        margin-bottom: 50px;
        &-text {
            @include fontStyle(50px, 500, "Alumni Sans", $dark-brown);
        }
    }
    &__btns {
        display: flex;
        gap: 30px;
        &-link {
            @include buttonStyle;
        }
        &-admin {
            @include buttonStyle;
        }
    }
}
</style>
