<script setup lang="ts">
import IconShoppingCart from "@/views/components/icons/icon-shopping-cart.vue";
import { ref } from "vue";

withDefaults(
    defineProps<{
        type?: "submit" | "button" | "reset";
    }>(),
    {
        type: "button",
    }
);

const show = ref(false);
</script>

<template>
    <button
        :type="type"
        class="inline-flex items-center rounded-md border border-transparent bg-gray-700 px-4 py-2 text-sm font-medium leading-4 text-white shadow-sm hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-offset-2"
        @click="show = true"
    >
        <IconShoppingCart
            class="-ml-1 mr-2 h-6 w-6"
            aria-hidden="true"
        />
        Add to Cart
    </button>
</template>
