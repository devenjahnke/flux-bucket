<script setup lang="ts">
import ButtonFavorite from "@/views/components/buttons/button-favorite.vue";
import ButtonCheckout from "@/views/components/buttons/button-checkout.vue";

defineProps<{
    product: App.Data.ProductData;
}>();
</script>

<template>
    <article class="flex h-full flex-col overflow-hidden rounded border border-gray-200 bg-white shadow-sm">
        <figure class="aspect-square overflow-hidden">
            <img
                class="h-full w-full object-cover object-center shadow-inner"
                :src="product.image"
                :alt="'Picture of the ' + product.name"
            />
        </figure>

        <div class="flex flex-1 flex-col justify-between space-y-4 p-4">
            <div class="space-y-2">
                <h3 class="text-sm font-medium text-gray-900">
                    {{ product.name }}
                </h3>

                <p class="text-sm text-gray-500">{{ product.description }}</p>

                <p class="text-base font-medium text-gray-900">${{ product.price.dollars }}</p>
            </div>

            <div class="flex justify-between space-x-4">
                <ButtonFavorite :active="product.is_favorite" />

                <ButtonCheckout />
            </div>
        </div>
    </article>
</template>
