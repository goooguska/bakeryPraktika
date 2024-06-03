<script setup>
defineProps({
    placeholder: {
        type: String,
        required: true,
    },
    name: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <div class="input">
        <input
            class="input-element"
            :name="name"
            :type="type"
            :placeholder="placeholder"
        />
    </div>
</template>

<style lang="scss" scoped>
@import "/resources/css/main.scss";

.input {
    max-width: 620px;
    width: 100%;
    &-element {
        @include inputStyle;
    }

    &-element::placeholder {
        color: rgba(162, 81, 51, 0.5);
    }
    &-element:focus {
        outline: none;
        border-color: $dark-brown;
        box-shadow: 0 0 5px $dark-brown;
    }
}
</style>
