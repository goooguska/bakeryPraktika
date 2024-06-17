import { defineStore } from "pinia";
import { ref } from "vue";
export const useCartStore = defineStore("cartStore", () => {
    const totalCost = ref(0);
    const cartItems = ref(new Set());
    const costProduct = ref(0);
    const countProduct = ref(0);
    const countTotalCost = () => {
        cartItems.value.forEach((el) => {
            totalCost.value += el.cost;
        });
    };

    const addToCart = (product) => {
        cartItems.value.add(product);
        countTotalCost();
        countProduct.value += 1;
        costProduct.value += product.cost;
    };
    const plusProduct = (product) => {
        countProduct.value += 1;
        cartItems.value.forEach((el) => {
            costProduct.value += el.cost;
            totalCost.value += el.cost;
        });
    };
    const minusProduct = (product) => {
        countProduct.value -= 1;
        cartItems.value.forEach((el) => {
            costProduct.value -= el.cost;
            totalCost.value -= el.cost;
        });
    };
    return {
        cartItems,
        plusProduct,
        minusProduct,
        addToCart,
        countProduct,
        costProduct,
        totalCost,
        countTotalCost,
    };
});
