<script setup lang="ts">
import ButtonFavorite from "@/views/components/buttons/button-favorite.vue";
import { router } from "@inertiajs/vue3";
import { route } from "momentum-trail";
import AddToCartButton from "@/views/pages/customer/menu/partials/add-to-cart-button.vue";

const props = defineProps<{
    product: App.Data.ProductData;
}>();

const favoriteProduct = () => {
    router.patch(
        route("user.favorite-product"),
        {
            product_id: props.product.id,
        },
        {
            preserveScroll: true,
        }
    );
};
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
                <ButtonFavorite
                    :active="product.is_favorite"
                    @click="favoriteProduct"
                />

                <AddToCartButton :product-id="product.id" />
            </div>
        </div>
    </article>
</template>
