<script setup lang="ts">
import ButtonFavorite from "@/views/components/buttons/button-favorite.vue";
import ButtonCheckout from "@/views/components/buttons/button-checkout.vue";
import IconHeart from "@/views/components/icons/icon-heart.vue";

defineProps<{
    product?: App.Data.ProductData;
}>();
</script>

<template>
    <article
        v-if="product"
        class="flex h-full flex-col overflow-hidden rounded border border-gray-200 bg-white shadow-sm sm:flex-row"
    >
        <figure class="aspect-square overflow-hidden sm:h-64">
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

            <div class="flex justify-between space-x-4 sm:justify-end">
                <ButtonCheckout />
            </div>
        </div>
    </article>

    <article
        v-else
        class="flex h-full overflow-hidden rounded border border-gray-200 bg-white shadow-sm sm:flex-row"
    >
        <div class="flex w-full flex-col items-center space-y-2 p-4">
            <IconHeart class="h-12 w-12 text-gray-300" />

            <h3 class="text-sm font-medium text-gray-900">Choose Your Favorite</h3>

            <p class="text-center text-sm text-gray-500">Favorite a product to make ordering easier.</p>
        </div>
    </article>
</template>
