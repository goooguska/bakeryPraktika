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
        <p class="profile-text" v-if="userInfo.role === 'admin'">
            Администратор
        </p>
        <p class="profile-text">Ваш логин: {{ userInfo.login }}</p>
        <p class="profile-text">Ваше имя: {{ userInfo.firstName }}</p>
        <p class="profile-text">Ваша почта: {{ userInfo.email }}</p>
        <p class="profile-text">Номер телефона: {{ userInfo.phoneNumber }}</p>

        <button @click.prevent="userStore.logoutUser" class="profile-link">
            Выйти
        </button>
    </div>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";

.profile {
    &-text {
        @include fontStyle(50px, 500, "Alumni Sans", $dark-brown);
    }
    &-text:nth-child(4) {
        margin-bottom: 60px;
    }
    &-link {
        @include buttonStyle;
    }
}
</style>
