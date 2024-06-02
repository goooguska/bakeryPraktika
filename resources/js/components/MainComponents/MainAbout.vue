<script setup></script>
<template>
    <div class="about">
        <div class="about__content">
            <h3 class="about__content-title">О ПЫШКЕ</h3>
            <p class="about__content-text">
                Сеть Пышка — рестораны Александра Алесандрова. Первая «Пышка» на
                Чистых прудах открылась в 2022 году, а в мае 2024 игристое
                открывали в честь запуска треьего ресторана на Цветном бульваре.
            </p>
            <p class="about__content-text">
                Завтрак в понедельник утром или лёгкий перекус на выходных
                —Пышка идеальна для любого выбора
            </p>
            <p class="about__content-text">
                Элегантная обстановка, открытая кухня и летняя терраса — главные
                особенности всех пекарен сети.
            </p>
            <p class="about__content-text">
                Дизайном интерьера первой Пышки на Мясницкой улице занимались
                братья Караваевы. Просторная пекарня вмещает 40 человек и
                рассчитана на полноценное кафе, объединяя в одном помещении как
                кухню, так и пекарню, что создает единое и гармоничное
                пространство. Летом рядом с рестораном появляется
                импровизированная веранда
            </p>
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";

.about {
    background-image: url("/assets/images/bgMain.png");
    &__content {
        padding: 112px 60px 190px 60px;
        text-align: center;
        &-title {
            margin-bottom: 20px;
        }
        &-text {
            margin-top: 50px;
            @include fontStyle(50px, 600, "Alumni Sans", $dark-brown);
        }
    }
}
</style>
