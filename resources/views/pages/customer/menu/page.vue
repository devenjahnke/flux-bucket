<script setup lang="ts">
import LayoutAuthenticated from "@/views/layouts/authenticated/layout-authenticated.vue";
import { Head } from "@inertiajs/vue3";
import ProductCard from "@/views/pages/customer/menu/partials/product-card.vue";
import FavoriteProductCard from "@/views/pages/customer/menu/partials/favorite-product-card.vue";
import { computed } from "vue";

const props = defineProps<{
    products: Array<App.Data.ProductData>;
}>();

const favoriteProduct = computed(() => {
    return props.products.find((product) => product.is_favorite);
});
</script>

<template>
    <Head title="Catalog" />

    <LayoutAuthenticated>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Menu</h2>
        </template>

        <div class="space-y-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Your Favorite</h3>

            <FavoriteProductCard :product="favoriteProduct" />
        </div>

        <div class="mt-8 space-y-6 sm:mt-10">
            <h3 class="text-lg font-medium leading-6 text-gray-900">All Products</h3>

            <div class="grid grid-cols-1 gap-y-4 sm:grid-cols-2 sm:gap-x-6 sm:gap-y-10 lg:grid-cols-3 lg:gap-x-8">
                <ProductCard
                    v-for="product in products"
                    :key="product.id"
                    :product="product"
                />
            </div>
        </div>
    </LayoutAuthenticated>
</template>
