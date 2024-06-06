<script setup></script>

<template>
    <footer class="footer">
        <nav class="footer__nav">
            <ul class="footer__nav-list">
                <RouterLink class="footer__nav-list-item" to="/"
                    >ГЛАВНАЯ
                </RouterLink>
                <RouterLink class="footer__nav-list-item" to="/news"
                    >НОВОСТИ
                </RouterLink>
                <RouterLink class="footer__nav-list-item" to="/menu"
                    >МЕНЮ
                </RouterLink>
                <RouterLink class="footer__nav-list-item" to="/gallery"
                    >ГАЛЕРЕЯ
                </RouterLink>
                <RouterLink class="footer__nav-list-item" to="/contacts"
                    >КОНТАКТЫ
                </RouterLink>
            </ul>
        </nav>
        <div class="footer__copyright">
            <p class="footer__copyright-text">© 2024 ПЫШКА</p>
        </div>
    </footer>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";
.footer {
    margin-top: 90px;
    // flex: 0 0 auto;

    @media (max-width: $mobileScreen) {
        margin-top: 30px;
    }
    &__nav {
        &-list {
            display: flex;
            justify-content: center;
            gap: 25px;
            &-item {
                @include underlineLink;

                @include fontStyle(30px, 500, "Alumni Sans", $dark-brown);
            }
        }
    }
    &__nav::after {
        display: block;
        content: "";
        background-color: $light-grey;
        height: 2px;
        max-width: 1796px;
        width: 100%;
        margin: 35px auto;
        @media (max-width: $smallMobileScreen) {
            margin: 5px auto;
        }
    }

    &__copyright {
        text-align: center;
        &-text {
            @include fontStyle(30px, 500, "Alumni Sans", $dark-brown);
        }
    }
}
</style>
