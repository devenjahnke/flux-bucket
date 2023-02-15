<script setup lang="ts">
import ButtonCheckout from "@/views/components/buttons/button-checkout.vue";
import { router } from "@inertiajs/vue3";
import { route } from "momentum-trail";

const props = defineProps<{
    productId: number | null;
}>();

const addToCart = () => {
    if (!props.productId) return;
    router.patch(
        route("cart.update"),
        {
            product_id: props.productId,
        },
        {
            preserveScroll: true,
            preserveState: false,
        }
    );
};
</script>

<template>
    <ButtonCheckout @click="addToCart" />
</template>
